@if($videos->count() > 0)
<div class="row">
@foreach($videos as $video)
    <div class="col--lg-6 col-md-6 col-sm-12 col-12 pt-4 pra_img ">
        <!--<img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{--$photo->image_url--}}">-->
        <a href="javascript:;" onclick="openVideo('{{$video->id}}');">
            <video class="rounded sidebarVideoGallery" controlsList="nodownload">
              <source src="{{URL::to('/')}}/public/videos/{{$video->video_url}}" type="video/mp4">
            </video>
        </a>
    </div>
@endforeach
</div>
@else
<div class="row">
    <h1 class="text-center text-secondary my-5">{{__('public.No_videos_available')}}</h1>
</div>
@endif


<script>
    

  function openVideo(video_id) {
    $.ajax({
      url: '{{ route('fetchVideo') }}' + '?video_id=' + video_id,
      method: 'get',
      success: function(response) {
        $(".modal-content").html(JSON.parse(response));
        // //$('.show_comments').scrollTop($('.show_comments')[0].scrollHeight);

        $('.bd-example-modal-lg').modal('show');
      },
      error: function(err) {
        alert(JSON.stringify(err));
      }
    });
}
</script>