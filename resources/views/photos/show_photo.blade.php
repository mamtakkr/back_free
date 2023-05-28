<!-- Modal Header -->
<button type="button" class="close" data-dismiss="modal">&times;</button>
      
<div class="row">
@if(!empty($photo->image_url))
  <div class="col-md-12">
    <div class="col-12 text-center"> 
    <img class="fsdew rounded" src="{{URL::to('/')}}/public/images/photos/{{$photo->image_url}}">
	</div>
  </div>
  @endif
</div>
