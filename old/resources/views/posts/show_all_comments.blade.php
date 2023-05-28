@if($comments->count() > 0)
@foreach($comments as $comment)
@php $userInfo = \App\Models\User::where('id',$comment->user_id)->first(); @endphp
<div class="row">
    <div class="col-md-12">
	<p><strong>{{ $userInfo->username ?? '-' }}: </strong>{{$comment->comment}}</p> 
       </div>
</div>
@endforeach
@endif