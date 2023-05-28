<!-- Modal Header -->
<button type="button" class="close" data-dismiss="modal">&times;</button>
      
<div class="row">
@if(!empty($video->video_url))
  <div class="col-md-12">
    <div class="col-12 text-center"> 
        <video class="rounded sidebarVideoGallery" controls autoplay controlsList="nodownload">
          <source src="{{URL::to('/')}}/public/videos/{{$video->video_url}}" type="video/mp4">
        </video>
	</div>
  </div>
  @endif
</div>
