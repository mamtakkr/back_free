@if($videos->count() > 0)
<div class="row">
@foreach($videos as $video)
    <div class="col--lg-6 col-md-6 col-sm-12 col-12 pt-4 pra_img ">
        <video class="rounded sidebarVideoGallery" controls controlsList="nodownload">
          <source src="{{URL::to('/')}}/public/videos/{{$video->video_url}}" type="video/mp4">
        </video>
    </div>
@endforeach
</div>
@else
<div class="row">
    <h1 class="text-center text-secondary my-5">No videos available!</h1>
</div>
@endif
