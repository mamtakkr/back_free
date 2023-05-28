@if($photos->count() > 0)
<div class="row">
    
@foreach($photos as $photo)
@if($photo->photo_type==1)
    <div class="col-4 pt-4 pra_img ">
        <img class="rounded" src="{{URL::to('/')}}/public/images/photos/{{$photo->image_url}}">
    </div>
@endif
@endforeach
</div>
@else
<div class="row">
    <h1 class="text-center text-secondary my-5">No photos available!</h1>
</div>
@endif