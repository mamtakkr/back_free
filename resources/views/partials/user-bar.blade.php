<div class="col-12">
  <div class="coment mt-5 rounded-4">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-12 section_messages">
        <div class="hgt"> 
		    @if(!empty($user_info->image_url)) 
		        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$user_info->image_url}}" width="100" height="100"> 
		    @else 
		        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="100" height="100"> 
		    @endif
		
		</div>
        <h5>{{ $user_info->username }}</h5>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 2section_messages"> 
	  <a type="button" href="{{ url('userPosts') }}" class="bg-standard-{{ (request()->segment(1) == 'userPosts') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1 new_btn"> {{__('public.Activity')}}</a> 
	  <a type="button" href="{{ url('photos') }}" class="bg-standard-{{ (request()->segment(1) == 'photos') ? 'violet text-white' : 'white text-dark' }}  base-radius px-3 py-2 mr-1 new_btn"> {{__('public.Photo')}}</a> 
	  <a type="button" href="{{ url('videos') }}" class="bg-standard-{{ (request()->segment(1) == 'videos') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1 new_btn"> {{__('public.Video')}}</a> 
	  <a type="button" href="{{ url('secrets') }}" class="bg-standard-{{ (request()->segment(1) == 'secrets') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1 new_btn"> {{__('public.Secret_Book')}}</a> 
      <a href="{{route('messages')}}" class="bg-standard-{{ (request()->segment(1) == 'messages') ? 'violet text-white' : 'white text-dark' }}  base-radius px-2 py-2 mr-2 new_btn"> {{__('public.Messages')}} </a>
	  </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-12 border border-light 3section_messages new_like_com">
	  
	    <div class="row">
          <div class="col-6 px-0 py-1 text-center border-right">
            <div class="text-center">
              <p>{{__('public.Follows')}}</p>
            <p>{{count(App\Models\Follow::where('follow_to', $user_info->id)->get())}}</p>
            </div>
          </div>
          <div class="col-6 py-1 text-center heading">
            <p>{{__('public.Like')}}</p>
            <p>{{count(App\Models\Like::where('like_to', $user_info->id)->get())}}</p>
          </div>
        </div>
	  
      </div>
    </div>
  </div>
</div>
