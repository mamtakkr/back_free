@if($photos->count() > 0)
<div class="row">
    
@foreach($photos as $photo)
@if($photo->photo_type==1)
    <div class="col-4 pt-4 pra_img ">
        <a href="javascript:;" onclick="openPhoto('{{$photo->id}}');">
            <img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{$photo->image_url}}">
        </a>
    </div>
@endif
@endforeach
</div>
@else
<div class="row">
    <h1 class="text-center text-secondary my-5">{{__('public.No_photos_available')}}</h1>
</div>
@endif

<script>
    
  function openPhoto(photo_id) {
    $.ajax({
      url: '{{ route('fetchPhoto') }}' + '?photo_id=' + photo_id,
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