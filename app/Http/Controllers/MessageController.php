<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use \Validator;
use URL;
use DB;
use Auth;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function messages1(Request $request, $id)
    // {
    //     //dd($id);
    //     // $users = User::where('user_type','!=','admin')
    //     //                 ->where('id','!=',Auth::user()->id)
    //     //                 ->where(['approved_status'=>'approved','active_status'=>'active'])->get();


    //     // $user_detail=User::where('id',Auth::user()->id)->first()->current_session;
    //     // $users = rtrim($user_detail, "|");
    //     // $users_arr = explode("|",$users);
    //     // $members=array();
    //     // foreach($users_arr as $key=>$value)
    //     // {
    //     $members[] = User::where('id', $id)->first();
    //     // }

    //     // if (count($members) > 0) {
    //     return view("msg.singleLists", compact('members'));
    //     // }else{
    //     // $output = view("msg.userLists", compact('members'))->render();
    //     // }
    //     // return json_encode($output);


    //     // return view('messages1',compact('users'));
    // }



    public function messages(Request $request, $id = null)
    {


        $user_detail = User::where('id', Auth::user()->id)->first()->new_chat;
        $users = rtrim($user_detail, "|");
        $users_arr = explode("|", $users);
        $all_messages = array();
        foreach ($users_arr as $key => $value) {
            $all_messages[] = User::select('users.username','users.id as user_id','users.you_are','users.club_name','users.user_type','users.image_url','users.online')
                //   ->join('messages','messages.sender_id','=','users.id')
                ->where('users.id', $value)->first();
        }


        $users = array();
        $userIds = array();
        foreach ($all_messages as $user) {
            if (!empty($user)) {
                if (empty(get_block($user->user_id))) {
                    $users[] = $user;
                    $userIds[] = $user->user_id;
                }
            }
        }

        if (!empty($id)) {
            if (!in_array($id, $userIds)) {
                array_unshift($users, User::where('id', $id)->select('*', 'id as user_id')->first());
            }
        }

        // dd($users);
        return view('messages1', compact('users','id'));
    }


    public function chat_action(Request $request)
    {
        if ($request->action == 'insert_chat') {
            $message = new Message([
                'sender_id' => Auth::user()->id,
                'receiver_id' => $request->get('receiver_id'),
                'message' => $request->get('message'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $message->save();

            $user_id = $message->sender_id;
            $reciever_userid = $message->receiver_id;

            if (!empty($reciever_userid)) {
                $receiver_user_detail = User::where('id', $reciever_userid);
                $old_receivers = $receiver_user_detail->first()->new_chat;
                if (!empty($old_receivers)) {
                    $old_receivers1=str_replace($user_id . "|","",$old_receivers );
                    $receiver_arr = explode('|', rtrim($old_receivers1, "|"));
                    if (!in_array($user_id, $receiver_arr)) {
                        $receiver_user_detail->update(['new_chat' => $user_id . "|" . $old_receivers1 ]);
                        $chat_status=DB::table('chat_statuss')->where(['sender_id'=>$user_id,'receiver_id'=>$reciever_userid])->first();
                        if(!empty($chat_status)){
                            DB::table('chat_statuss')->update(['no_of_messages' => 2]);
                        }else{
                            DB::table('chat_statuss')->insert([
                                'sender_id'=>$user_id,
                                'receiver_id'=>$reciever_userid,
                                'no_of_messages'=>1,
                            ]);
                        }
                    }
                } else {
                    $receiver_user_detail->update(['new_chat' => $user_id . "|"]);
                    $chat_status=DB::table('chat_statuss')->where(['sender_id'=>$user_id,'receiver_id'=>$reciever_userid])->first();
                    if(!empty($chat_status)){
                        DB::table('chat_statuss')->update(['no_of_messages' => 1]);
                    }else{
                        DB::table('chat_statuss')->insert([
                            'sender_id'=>$user_id,
                            'receiver_id'=>$reciever_userid,
                            'no_of_messages'=>1,
                        ]);
                    }
                }
            }
            if (!empty($user_id)) {
                $sender_user_detail = User::where('id', $user_id);
                $old_senders = $sender_user_detail->first()->new_chat;
                if (!empty($old_senders)) {
                    $old_senders1=str_replace($reciever_userid . "|", "", $old_senders );
                    $sender_arr = explode('|', rtrim($old_senders1, "|"));
                    if (!in_array($reciever_userid, $sender_arr)) {
                        $sender_user_detail->update(['new_chat' => $reciever_userid . "|" . $old_senders1 ]);
                    }
                } else {
                    $sender_user_detail->update(['new_chat' => $reciever_userid . "|"]);
                }
            }

            $conversation = getUserChat($user_id, $reciever_userid);
            
            $user = User::where('id', $user_id)->first();

            $output = "";
            if ($conversation->count() > 0) {
                $output = view("msg.conversation", compact('user', 'conversation'))->render();
            } else {
                $output = view("msg.conversation", compact('user', 'conversation'))->render();
            }
            return json_encode($output);
        }
    }


    public function update_user_chat(Request $request)
    {
        if ($request->action == 'update_user_chat') {
            $conversation = getUserChat(Auth::user()->id, $request->to_user_id);
            if($request->is_read == 1){
                $chats = DB::table('messages')->where(['sender_id'=>$request->to_user_id,'receiver_id'=>Auth::user()->id])->update(['is_read'=>1]);
                $chat2=DB::table('chat_statuss')->where(['sender_id'=>$request->to_user_id,'receiver_id'=>Auth::user()->id])->update(['no_of_messages'=>0]);
            }
            $user = User::where('id', $request->to_user_id)->first();
            $output = "";
            if ($conversation->count() > 0) {
                $output = view("msg.conversation", compact('user', 'conversation'))->render();
            } else {
                $output = view("msg.conversation", compact('user', 'conversation'))->render();
            }
            return json_encode($output);
        }
    }


    public function show_chat(Request $request)
    {
        if ($request->action == 'show_chat') {
            DB::table('chat_statuss')->where(['sender_id'=>Auth::user()->id,'receiver_id'=>$request->to_user_id])->update(['no_of_messages'=>0]);
            $chats = DB::table('messages')->where(['sender_id'=>Auth::user()->id,'receiver_id'=>$request->to_user_id])->update(['is_read'=>1]);
            
            $to_user_id = $request->to_user_id;
            $from_user_id = Auth::user()->id;

            $user = User::where('id', $to_user_id)->first();

            $output = "";

            $conversation = getUserChat($from_user_id, $to_user_id);
            $result1 = User::where(['id' => $from_user_id])->update(['current_session' => $to_user_id]);

            if ($user->count() > 0) {
                $output = view("msg.userSection", compact('user', 'conversation'))->render();
            } else {
                $output = view("msg.userSection", compact('user', 'conversation'))->render();
            }
            return json_encode($output);
        }
    }


    public function users_list(Request $request)
    {
        if ($request->action == 'update_user_list') {
            $user_detail = User::where('id', Auth::user()->id)->first()->new_chat;
            $users = rtrim($user_detail, "|");
            $users_arr = explode("|", $users);
            $all_messages = array();
            foreach ($users_arr as $key => $value) {
                $all_messages[] = User::select('users.username','users.id as user_id','users.you_are','users.club_name','users.user_type','users.image_url','users.online')
                //   ->join('messages','messages.sender_id','=','users.id')
                ->where('users.id', $value)->first();
            }
            
            $members = array();
            $userIds = array();
            foreach ($all_messages as $user) {
                if (!empty($user)) {
                    if (empty(get_block($user->user_id))) {
                        $members[] = $user;
                        $userIds[] = $user->user_id;
                    }
                }
            }

            if (!empty($request->id)) {
                if (!in_array($request->id, $userIds)) {
                    array_unshift($members, User::where('id', $request->id)->select('*', 'id as user_id')->first());
                }
            }
            
            $output = view("msg.userLists", compact('members'))->render();

            return json_encode($output);
        }
    }


    public function search_contacts(Request $request)
    {
        $output = '';
        $query = $request->value;

        $user_detail = User::where('id', Auth::user()->id)->first()->new_chat;
        $users = rtrim($user_detail, "|");
        $users_arr = explode("|", $users);
        
        $data = array();
        if (!empty($query)) {
            foreach ($users_arr as $key => $value) {
                $all_messages = User::select('users.username','users.id as user_id','users.you_are','users.club_name',
                    'users.user_type','users.image_url','users.online'
                )
                    //   ->join('messages','messages.sender_id','=','users.id')
                    ->where('users.id', $value)->where('users.username', 'LIKE', "%$query%")->first();
                if (!empty($all_messages)) {
                    $data[] = $all_messages;
                }
            }
        }else{
            foreach ($users_arr as $key => $value) {
                $all_messages = User::select('users.username','users.id as user_id','users.you_are','users.club_name',
                    'users.user_type','users.image_url','users.online'
                )
                    //   ->join('messages','messages.sender_id','=','users.id')
                    ->where('users.id', $value)->first();
                if (!empty($all_messages)) {
                    $data[] = $all_messages;
                }
            }
        }

        $total_row = count($data);
        if (count($data) > 0) {
            $currentSession = '';
            $x = 0;
            $output .= '<ul id="new_contact">';
            foreach ($data as $user) {
                $currentSession = $user->user_id;
                if ($user->online == 1) {
                    $status = 'online';
                } else {
                    $status = 'offline';
                }
                
                $img_url = url('/') . '/public/images/users/' . $user->image_url;

                if ($x == 1) {
                    $active = 'active';
                } else {
                    $active = '';
                }

                if ($x % 2 == 0) {
                    $color = 'style="color: #F50087;font-size:20px;"';
                } else {
                    $color = 'style="color: #50A8E2;font-size:20px;"';
                }

                if ($user->user_type == 'member') {
                    $type = $user->you_are;
                } else {
                    $type = $user->club_name;
                }
  
        $output .= '<li id="' . $user->user_id . '" class="contact ' . $active . '" 
            data-touserid="' . $user->user_id . '" data-tousername="' . $user->username . '">
                <div class="wrap"><span id="status_' . $user->user_id . '" class="contact-status ' . $status . '"></span>
                    <img src="' . $img_url . '" alt="' . $user->username . '">
                    <div class="meta">
                    <p ' . $color . ' class="user_name">' . $user->username . '</p>
                        <span id="unread_' . $user->user_id . '" class="unread"></span></p>
                        <p class="second_name">' . $type . '</p>
                        <p class="preview"><span id="isTyping_' . $user->user_id . '" class="isTyping"></span></p>
                    </div>
                </div>
            </li>
            ';
                    }
                    $x++;
                    $output .= '</ul>';
                } else {
                    $output = '
           <tr>
            <td align="center" colspan="5">'.__("public.No_Data_Found").'</td>
           </tr>
           ';
                }

            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        // }
    }
}
