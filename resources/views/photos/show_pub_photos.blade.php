@if($photos->count() > 0)
<div class="row">
@foreach($photos as $photo)
    <div class="col-4 pt-4 pra_img ">
        <form name="myForm" method="POST" action="{{route('photo-delete',$photo['id'])}}" class="float-right">
            @csrf
            <input type="hidden" name="_method" value="Delete" />
            <a href="javascript:;" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm dltBtn" data-id="{{$photo->id}}">
               <span class="del_pub_photos">X</span>
            </a>
        </form>
        <a href="javascript:;" onclick="openPhoto('{{$photo->id}}');">
            <img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{$photo->image_url}}">
        </a>
    </div>
@endforeach
</div>
@else
<div class="row">
    <h1 class="text-center text-secondary my-5">{{__('public.No_photos_available')}}</h1>
</div>
@endif


<script>
    
    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "{{ __('public.Are_you_sure') }}",
          text: "{{ __('public.delete_yourself') }}",
          icon: "{{ __('public.warning') }}",
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