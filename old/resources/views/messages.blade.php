@extends('layouts.front')

@section('content')
<head>
   <link href="https://demogswebtech.com/freely/public/front/css/msg.css" rel="stylesheet">
</head>    
 <!-- Demo header-->
<section class="header">
    <div class="container py-4">
        


        <div class="row" id="message-wrapper">
            <div style="background-color:#616161; overflow-y: auto; max-height: 472px;" class="col-md-3">
                <!-- Tabs nav -->
                <div style="margin-top:40px;" class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php $x=1;?>
                    @foreach($users as $user)
                    <a class="nav-link mb-3 shadow @if($x==1) active @endif" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        @if(!empty($user->image_url))
                            <img class="pf-img mr-2" src="{{URL::to('/')}}/public/images/users/{{$user->image_url}}"> 
                        @else 
                            <img class="pf-img mr-2" src="{{URL::to('/')}}/public/images/no-user.png"> 
                        @endif 
                        
                        @if($x % 2 == 0)
                        <span style="color: #F50087;font-size:20px;" class="font-weight-bold name">{{$user->username}}<br> 
                        @else
                        <span style="color: #50A8E2;font-size:20px;" class="font-weight-bold name">{{$user->username}}<br> 
                        @endif
                            <span class="profile-ab">
                                @if($user->user_type=='member')
                                {{$user->you_are}}
                                @else
                                {{$user->club_name}}
                                @endif
                            </span>
                        </span>
                    </a>
                    <?php $x++; ?>
                    @endforeach
                    <!--<a class="nav-link mb-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">-->
                    <!--    <img src="{{URL::to('/')}}/public/frontend/imgs/Proffle3.jpg" class="pf-img mr-2">-->
                    <!--    <span style="color:#F50087;font-size:20px; " class="font-weight-bold name2">David<br> -->
                    <!--        <span class="profile-ab">Chat Two</span></span></a>-->
                </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <!--header one for profile one-->
                        
                        <header class="profile-header" id="pf-One" style="padding:5px;">
                            <img class="head-img" src="{{URL::to('/')}}/public/frontend/imgs/Proffle1.png" alt="">
                           <div class="details"> <span style="color:#ff128e; font-weight:bold;">Lisa</span>
                            <p style="color:#fff; font-weight:bold;">Couple Bi</p>
                           </div>
                        </header>
                        
                        <li><img id="chat-img1" src="{{URL::to('/')}}/public/frontend/imgs/Proffle1.png " alt="profiel-three"></li>
                        <h6 class="chatBox">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </h6>
                        <li style="margin-top:10%;"><img id="chat-img2" src="{{URL::to('/')}}/public/frontend/imgs/Proffle3.jpg " alt="profiel-three"></li>
                        <h6 style="margin-top:20%;" class="chatBox2">Je suis un paragraphe. Cliquez ici pour ajouter votre propre texte et me modifier. C'est facile.</h6>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded  p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <!--header two for profile two-->
                        <header class="profile-header" id="pf-two" style="padding:5px;">
                            <img class="head-img2" src="{{URL::to('/')}}/public/frontend/imgs/Proffle3.jpg" alt="">
                           <div class="details"> <span style="color:#ff128e; font-weight:bold;">David</span>
                            <p style="color:#fff; font-weight:bold;">bi man</p>
                           </div>
                        </header
                         
                         
                        <li><img id="rec-img1" src="{{URL::to('/')}}/public/frontend/imgs/Proffle3.jpg" alt="profiel-three"></li>
                        <h6 style="margin-top:20%;" class="chat-cBox">Je suis un paragraphe. Cliquez ici pour ajouter votre propre texte et me modifier. C'est facile.</h6>

                        <li><img class="rec-img2" id="rec-img2" src="{{URL::to('/')}}/public/frontend/imgs/Proffle1.png " alt="profiel-three"></li>
                        <h6 class="chat-cBox2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </h6>                        
                    </div>

                    <form  style="background-color: #000; border: 2px solid #ffff;" id="add_message_form" name="productForm" enctype="multipart/form-data" class="typing-area">
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                        <input type="text" name="message" id="message_input" placeholder="Write your message..." autocomplete="off">
                        <button type="submit" id="Send-btn">Send</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</section>



 
@endsection
