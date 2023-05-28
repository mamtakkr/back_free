<div class="col-12">
  <div class="coment mt-5 rounded-4">
    <div class="row">
      <div class="col-3">
        <div class="hgt"> 
		    @if(!empty($user_info->image_url)) 
		        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$user_info->image_url}}" width="100" height="100"> 
		    @else 
		        <img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="100" height="100"> 
		    @endif
		
		</div>
        <h5>{{ $user_info->username }}</h5>
      </div>
      <div class="col-6"> 
	  <a type="button" href="{{ url('userPosts') }}" class="bg-standard-{{ (request()->segment(1) == 'userPosts') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1"> {{__('Activity')}}</a> 
	  <a type="button" href="{{ url('photos') }}" class="bg-standard-{{ (request()->segment(1) == 'photos') ? 'violet text-white' : 'white text-dark' }}  base-radius px-3 py-2 mr-1"> {{__('Photo')}}</a> 
	  <a type="button" href="{{ url('videos') }}" class="bg-standard-{{ (request()->segment(1) == 'videos') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1"> {{__('Video')}}</a> 
	  <a type="button" href="{{ url('secrets') }}" class="bg-standard-{{ (request()->segment(1) == 'secrets') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1"> {{__('Secret Book')}}</a> 
      <a href="{{route('messages')}}" class="bg-standard-{{ (request()->segment(1) == 'messages') ? 'violet text-white' : 'white text-dark' }}  base-radius px-2 py-2 mr-2"> Messages </a>
	  </div>
      <div class="col-3 border border-light">
	  
	    <div class="row">
          <div class="col-6 px-0 py-1 text-center border-right">
            <div class="text-center">
              <p>{{__('Follows')}}</p>
            <p>{{count(App\Models\Follow::where('follow_to', $user_info->id)->get())}}</p>
            </div>
          </div>
          <div class="col-6 py-1 text-center heading">
            <p>{{__('Like')}}</p>
            <p>{{count(App\Models\Like::where('like_to', $user_info->id)->get())}}</p>
          </div>
        </div>
	  
      </div>
    </div>
  </div>
</div>
