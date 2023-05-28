@if($videos->count() > 0)
<div class="row">
@foreach($videos as $video)
    <div class="col--lg-6 col-md-6 col-sm-12 col-12 pt-4 pra_img ">
        <form name="myForm" method="POST" action="{{route('video-delete',$video['id'])}}" class="float-right">
            @csrf
            <input type="hidden" name="_method" value="Delete" />
            <a href="javascript:;" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm dltBtn" data-id="{{$video->id}}">
               <span class="del_pri_videos">X</span>
            </a>
        </form>
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
    
    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "{{ __('public.Are_you_sure') }}",
          text: "{{ __('public.delete_photo') }}",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("{{ __('public.data_deleted') }}", {
              icon: "success",
            });
          } else {
            swal("{{ __('public.Record_safe') }}");
          }
        });
    });
    
  
    
</script>