@extends('layouts.front')

@section('content')
@include('partials.modals')

<div class="container">
    
  @include('partials.member-bar',['user_counter'=>$user_counter])
  
	<div class="row h-100 justify-content-center">
		<div class="col-lg-7 col-md-7 col-sm-7">
		    @if($message=Session::get('success'))
            <div class="alert bg-green alert-dismissible" role="alert" id="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $message }}
            </div>
            @endif
            <form action="{{route('secret-store')}}" method="post">
                @csrf
    			<div class="coment bg-standard-grey mt-3 heading">
    				<h5 class="white">{{__('Release the secret')}}</h5>
    				<input type="hidden" name="sec_to_id" value="{{$user_counter['member_details']->user_id}}">
    				<input type="hidden" name="sec_from_id" value="{{Auth::user()->id}}">
    				<textarea class="form-control" name="message" rows="4" placeholder="Message" required>{{old('message')}}</textarea>
    			</div>
    			<div class="text-center mt-2">
                    <button type="submit" class="boder-0 py-2 px-3 rounded bg-standard-violet text-white ">Publish</button>
                  </div>
    		</form>


            @if($secrets->count()>0)
            @foreach($secrets as $secret)
			<div class="coment bg-standard-grey mt-5">
				<div class="row">
					<div class="col-12 px-0 heading">
						<div class="row align-items-center ">
							<div class="mb-2 mr-2 rounded_images">
								@if(!empty($secret->relUser->image_url))
								<img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$secret->relUser->image_url}}" width="80" height="80">
								@else
								<img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80">
								@endif
							</div>
							<div>
								<h5 class="name_color">{{$secret->relUser->username}}</h5>
								<labal class="while">{{$secret->relUser->you_are}}</labal>
							</div>
						</div>
						<p>{{$secret->message}}</p>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class="coment bg-standard-grey mt-5">
				<div class="row heading">
					<div class="col-md-12 col-sm-12 col-12">
					    {{__('There are no secrets in your secret book.')}}
					</div>
				</div>

			</div>
			@endif


		</div>

	</div>

</div>
<script>
    $(function() {
        $("#add_like_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '{{ route('like-store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_like_btn").removeClass('fa-heart-o');
                        $("#add_like_btn").addClass('fa-heart');
                        $("#add_like_form")[0].reset();
                    }
                    if (response.status == 400) {
                        $("#add_like_btn").removeClass('fa-heart');
                        $("#add_like_btn").addClass('fa-heart-o');
                        $("#add_like_form")[0].reset();
                    }
                }
            });

        });


        $("#add_follow_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '{{ route('follow-store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_follow_btn").text('+ Following');
                        $("#add_follow_form")[0].reset();
                    }
                    if (response.status == 400) {
                        $("#add_follow_btn").text('+ Follow');
                        $("#add_follow_form")[0].reset();
                    }
                }
            });

        });
        
    });
    
     
    
function addBlacklist(id) {
	var thiss = $(this);
    var _token = "{{csrf_token()}}";
    var qs = {
        to_id: id,
        _token: _token
    };
    
    $.ajax({
        url: "{{ route('blacklist-store') }}",
        method: "Post",
        data: qs,
        success: function(response) {
			if (response.status == 200) {
                $("#blacklist_btn"+id).text('Blacklisted');
                document.getElementById("blacklist_btn"+id).disabled=true;
                window.location.reload();
            }
        },
        error: function(request, status, error) {
            console.log('Error is' + request.responseText);
        }
    });
}
</script>

@endsection