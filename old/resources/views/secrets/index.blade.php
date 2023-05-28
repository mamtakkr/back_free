@extends('layouts.front')

@section('content')
@include('partials.modals')

<div class="container">
	@include('partials.user-bar',['user_info'=>$user_info])

	<div class="row h-100 justify-content-center">
		<div class="col-lg-7 col-md-7 col-sm-7">

            @if($secrets->count()>0)
            @foreach($secrets as $secret)
            @if(empty(get_block($secret->sec_from_id)))
			<div class="coment bg-standard-grey mt-5">
				<div class="row heading">
					<div class="col-md-6 col-sm-6 col-12">
						<div class="row align-items-center ">
							<div class="mb-2 mr-2 rounded_images">
							    @if(!empty($secret->relUser->image_url))
								<img class="rounded-circle" src="{{URL::to('/')}}/public/images/users/{{$secret->relUser->image_url}}" width="80" height="80">
								@else
								<img class="rounded-circle" src="{{URL::to('/')}}/public/images/no-user.png" width="80" height="80">
								@endif
							</div>
							<div>
								<h5 class="name_color mb-0">{{$secret->relUser->username}}</h5>
								<labal class="while">{{$secret->relUser->you_are}}</labal>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-12 text-right">
						<div class="bta">
						    @if($secret->status!='pending')
                    	        @if($secret->status=='rejected')
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Rejected
                                </button>
                                @else
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Accepted
                                </button>
                                @endif
                    		 @else
                    		    @if($secret->status=='pending' || $secret->status=='rejected')
    							<a href="javascript:void(0)" type="button" class=" mt-3 rounded bg-standard-violet text-white  px-2 py-2" 
    							onclick="addAccept({{$secret['id']}})" id="add_accept_btn{{$secret->id}}">{{__('Accept')}}</a>
    							@else
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Accepted
                                </button>
                                @endif
                                @if($secret->status=='pending' || $secret->status=='accepted')
    							<a href="javascript:void(0)" type="button" class=" mt-3 rounded bg-standard-violet text-white  px-2 py-2"
    							onclick="addReject({{$secret['id']}})" id="add_reject_btn{{$secret->id}}">{{__('Reject')}}</a>
    							@else
                                <button type="submit" class="mt-3 border-0 rounded bg-standard-violet text-white  px-2 py-2">
                                Rejected
                                </button>
                                @endif
                            @endif
						</div>
					</div>
				</div>
				<p>{{$secret->message}}</p>
			</div>
			@endif
			@endforeach
			@else
			<div class="coment bg-standard-grey mt-5">
				<div class="row heading">
					<div class="col-md-12 col-sm-12 col-12">
					    {{__('There is no any secrets in your secret book.')}}
					</div>
				</div>

			</div>
			@endif


		</div>

	</div>

</div>

<script>
   
   function addAccept(id) {
            // alert(id);
			var thiss = $(this);
            var _token = "{{csrf_token()}}";
            var qs = {
                secret_id: id,
                _token: _token
            };
            //  alert(JSON.stringify(qs));
            $.ajax({
                url: "{{ route('secret-accept-store') }}",
                method: "Post",
                data: qs,
                success: function(response) {
					if (response.status == 200) {
                        $("#add_accept_btn"+id).text('Accepted');
                        document.getElementById("add_accept_btn"+id).disabled=true;
                        document.getElementById("add_reject_btn"+id).style.display = 'none';
                        // $("#add_accept_form")[0].reset();
                        $('#all_secrets').load(location.href + ' #all_secrets');
                    }
                },
                error: function(request, status, error) {
                    console.log('Error is' + request.responseText);
                }
            });
        }
        
        
   function addReject(id) {
            // alert(id);
			var thiss = $(this);
            var _token = "{{csrf_token()}}";
            var qs = {
                secret_id: id,
                _token: _token
            };
            //  alert(JSON.stringify(qs));
            $.ajax({
                url: "{{ route('secret-reject-store') }}",
                method: "Post",
                data: qs,
                success: function(response) {
					if (response.status == 200) {
                        $("#add_reject_btn"+id).text('Rejected');
                        document.getElementById("add_reject_btn"+id).disabled=true;
                        document.getElementById("add_accept_btn"+id).style.visibility = 'hidden';

                        // $("#add_reject_form")[0].reset();
                        $('#all_secrets').load(location.href + ' #all_secrets');
                    }
                },
                error: function(request, status, error) {
                    console.log('Error is' + request.responseText);
                }
            });
        }
        
        
</script>

@endsection