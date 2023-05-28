<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use \Validator;
use URL;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function posts(Request $request)
    {
		$user_info = User::where('id',Auth::user()->id)->first();
		$posts = Post::where('user_id',Auth::user()->id)->orderBy('created_at')->get();
        return view('posts', compact('user_info','posts'));
	}
    
	public function userPosts(Request $request)
    {
		$user_info = User::where('id',Auth::user()->id)->first();
		$posts = Post::where('user_id',Auth::user()->id)->orderBy('created_at')->get();
        return view('posts.userPosts', compact('user_info','posts'));
	}
	
	public function fetchUserPosts() {
		$posts = Post::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
		
	    $output = "";
		if ($posts->count() > 0) {
			$output = view("posts.show_user_posts", compact('posts'))->render();
		}else{
		    $output = view("posts.show_user_posts", compact('posts'))->render();
		}

		return json_encode($output);
	}
	
	public function fetchAllPosts() {
		$posts = Post::orderBy('created_at','desc')->get();
		
	    $output = "";
		if ($posts->count() > 0) {
			$output = view("posts.show_all_posts", compact('posts'))->render();
		}else{
		    $output = view("posts.show_all_posts", compact('posts'))->render();
		}

		return json_encode($output);
	}
	
	
	public function fetchPost(Request $request) {
		$post_id = $request->get('post_id');
		$post = Post::where('id',$post_id)->first();
		
	    $output = view("posts.show_post", compact('post'))->render();

		return json_encode($output);
	}
	
	


	public function postStore(Request $request) 
	{
        $validator =  Validator::make($request->all(), [
            'description' => 'required|max:500',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
			'description.required' => "Please write something to post first!",
            'image_url.max' => 'The image must not be greater than 2MB.'    
        ]);
        
        if($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ]);
        }else{
            $new_name = "";
            $image = $request->file('image_url');
            if ($image != '') {
                $new_name = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->get('title')) . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/posts/') , $new_name);
            }
    
    		$postData = [
    		    'user_id' => Auth::user()->id,
    		    'description' => $request->description, 
    		    'image_url' => $new_name,
    		];
    		
    		Post::create($postData);
    		return response()->json([
    			'status' => 200,
    		]);
        }

	}

	public function fetchAllComments(Request $request) {
		$post_id = $request->get('post_id');
		//$comments = Comment::where('post_id',$post_id)->sortBy('created_at')->limit(3)->get();
		
		if($request->get('comment_limit')=='yes')
		{
		$chatMessage = Comment::where('post_id',$post_id)
                              ->latest()
                              ->take(3)
                              ->get();
		}
		else
		{
		$chatMessage = Comment::where('post_id',$post_id)
                              ->latest()
                              ->get();
		}
							  
        $comments = $chatMessage->reverse();
		
		
	    $output = "";
		if ($comments->count() > 0) {
			$output = view("posts.show_all_comments", compact('comments'))->render();
		}else{
		    $output = view("posts.show_all_comments", compact('comments'))->render();
		}

		return json_encode($output);
	}
	
	public function commentStore(Request $request)
	{
		$commentData = new Comment([
            'user_id' => $request->get('user_id'),
            'post_id' => $request->get('post_id'),
            'comment' => $request->get('comment'),
            // 'created_at' => date('Y-m-d'),
            // 'updated_at' => date('Y-m-d'),
        ]);
        $commentData->save();
        
		return response()->json([
			'status' => 200,
			'post_id' => $request->post_id,
			'comment_limit' => $request->comment_limit,
		]);
	}

}