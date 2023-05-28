@extends('layouts.front')

@section('content')
	 
		<div class="container " >
				<div class="row h-100 justify-content-center">	
				<div class="col-lg-4 col-md-4 col-sm-6">	
					<div class="coment bg-standard-grey mt-5 p-0">
						<div class="row">
							<div class="date_photo gyw w-100">
							    @if(!empty($event->banner)) 
							        <img src="{{URL::to('/')}}/public/images/events/{{$event->banner}}"> 
							    @else 
							        <img src="{{URL::to('/')}}/public/images/default.jpg"> 
							    @endif	
							</div>
						</div>
					</div>
					
					
					<div class="photos mt-5">
						<p class="text-white">{{__('public.Participants')}}<p>
						<div class="coment pt-0 ">
							<div class="row">
							    @if($participates->count() > 0)
							    @foreach($participates as $participate)
    							<div class="col-4 pt-4 pra_img ">
								    <a href="javascript:;" onclick="openParticipate('{{$participate->relUser->id}}');">
    							    @if(!empty($participate->relUser->image_url))
    									<img class="rounded" src="{{URL::to('/')}}/public/images/users/{{$participate->relUser->image_url}}">	
    								@else
    									<img class="rounded" src="{{URL::to('/')}}/public/images/no-user.png">	
    								@endif
    							    </a>
    							</div>
								@endforeach
								@else
                                <div class="row">
                                    <h1 class="text-center text-secondary my-5">{{__('public.No_Participant_Found')}}</h1>
                                </div>
                                @endif
							</div>
						</div>
					</div>
				</div>	
					
			
				<div class="col-lg-8 col-md-8 col-sm-6 mb-4 new_events_details">	
					<div class="coment  mt-5 first_date_events_details">
						<div class="row">
							<div class="col-lg-6 col-md-6 colsm-6 col-7 px-0 " >
								<p>{{date('l', strtotime($event['start_date']))}} <span class="new_date">{{date('d M Y', strtotime($event['start_date']))}}</span></p>
								<h4>{{strtoupper($event->title)}}</h4>
								<p>{{$event->organizer}}</p>
								<p>{{$event->address}}</p>
							</div>	
							<div class="col-lg-6 col-md-6 colsm-6 col-5 events_acepted_declined">	
								<div class="float-right">
								    
								    <?php
								    if($event->user_id!=Auth::user()->id){
                                        if(empty($participate_exists)){
                                    ?>
                                    <form action="#" method="POST" id="add_participate_form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{$event->id}}">
                                        <input type="hidden" name="participate_from" value="{{Auth::user()->id}}"> 
                                        <button type="submit" id="add_participate_btn" class="bg-standard-violet base-radius text-white px-2 py-2">
                                        {{__('public.I_Participate')}}
                                        </button>
                                    </form>
                                    <?php }elseif($participate_exists->status=='pending'){ ?>
                                    <button type="submit" class="bg-standard-violet base-radius text-white px-2 py-2">
                                    {{__('public.Participated')}}
                                    </button>
                                    <?php }elseif($participate_exists->status=='accepted'){ ?>
                                    <button type="submit" class="bg-standard-violet base-radius text-white px-2 py-2">
                                    {{__('public.Request_Accepted')}}
                                    </button>
                                    <?php }elseif($participate_exists->status=='rejected'){ ?>
                                    <button type="submit" class="bg-standard-violet base-radius text-white px-2 py-2">
                                    {{__('public.Request_Declined')}}
                                    </button>
                                    <?php
                                        }
								    }
                                    ?>    
								</div>	
							   </div> 
						</div>
						
						<div class="new_ted mt-3">
								<p>{{__('public.Event_Prices')}}</p>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-6 first_events_box">
										<div class="boxsw text-white color_gr text-center pt-3 pb-2">
											<h4>{{$event->couples}} <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>{{__('public.Couples')}}<p>
										</div>
										
									</div>
									<div class="col-lg-3 col-md-3 col-6 events2_box">
										<div class="boxsw bg-standard-violet text-center text-white pt-3 pb-2">
											<h4>{{$event->women}} <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>{{__('public.Women')}}<p>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-6 events3_box">	
										<div class="boxsw bg-standard-blur text-center text-white pt-3 pb-2">
											<h4>{{$event->men}} <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>{{__('public.Men')}}<p>
										</div>
									</div>	
									<div class="col-lg-3 col-md-3 col-6 events4_box">
										<div class="boxsw bg-warning text-center text-white pt-3 pb-2">
											<h4>{{$event->transgender}} <i class="fa fa-eur" aria-hidden="true"></i></h4>
											<p>{{__('public.Transgender')}}<p>
										</div>
									</div>	
								</div>
							</div>	
						</div>
						
						
						<div class="sec_date_events_details coment mt-5">
							<div class="row">
								<div class="col-12 px-0 heading" >
									<p>{{$event->description}}</p>
								</div>
							</div>
						</div>
					
					
				</div>
			</div>
			</div>
		</div>	
		


<div class="modal fade bd-example-modal-lg post-details modal_pofile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $("#add_participate_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                url: '{{ route('participate-store') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        $("#add_participate_btn").text("{{ __('public.Participated') }}");
                        document.getElementById("add_participate_btn").disabled=true;
                        $("#add_participate_form")[0].reset();
                    }
                    // if (response.status == 400) {
                    //     $("#add_participate_btn").text('I Participate');
                    //     $("#add_participate_form")[0].reset();
                    // }
                }
            });
        });
    });
    
    
    
    
function openParticipate(user_id)
{
	$.ajax({
      url: '{{ route('fetchParticipate') }}'+'?user_id='+user_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
		//$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

		$('.bd-example-modal-lg').modal('show');
      },
	  error: function(err)
	  {
	  	alert(JSON.stringify(err));
	  }
    });
}
</script>
		
		
		
@endsection
