@extends('layouts.front')

@section('content')

<style>
    .new_coment{
        height: 500px;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6">
            <p style="text-align:center; font-weight:bold; color:#ff128e;">Welcome to the subscriptions page. <br> You can choose either monthly or yearly subscription as mentioned below:</p>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row h-100 ">
        <div class="col-lg-2 col-md-6 col-sm-6"></div>
        
        @foreach($plans as $plan)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="coment new_coment mt-3">
                <div class="row">
                    <div class="col-12 heading">
                        <center><h5> {{ucfirst($plan->name)}} </h5></center>
                        <center><p>{{env('currency_symbol')}}{{$plan->price}}/{{$plan->plan_type}} </p></center>
                        @if(!empty(auth()->user()->plan_id) && auth()->user()->plan_id == $plan->id)
                            <center><p>Start Date: {{date('d M Y',strtotime(auth()->user()->subscribe_date))}} <br> End Date: {{date('d M Y',strtotime(auth()->user()->ends_at))}}</p></center>
                            @if(auth()->user()->ends_at > date('Y-m-d'))
                            <center><p>Days Remaining : {{Carbon::now()->diffInDays(\Carbon\Carbon::parse(auth()->user()->ends_at))}} days</p></center>
                            @else
                            <center><p>Expired</center></p>
                            @endif
                        @endif
                    </div>
                    <div class="col-12 px-0 heading">
                        <!--<h5 class="mt-1"> Shivic24 </h5>-->
                        <p>@if(!empty($plan->description)) {!!$plan->description!!} @endif</p>
                        <center>
                            @if(!empty(auth()->user()->plan_id) && auth()->user()->ends_at > date('Y-m-d'))
                                @if(auth()->user()->plan_id == $plan->id && auth()->user()->ends_at > date('Y-m-d'))
                                <p class="btn btn-empty btn-pink">Activated</p>
                                @endif
                            @else
                                <a href="{{route('payment-method',Crypt::encrypt($plan->id))}}" class="btn btn-empty btn-pink">Choose Plan</a>
                            @endif
                            
                        </center>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        
        <div class="col-lg-2 col-md-6 col-sm-6"></div>

    </div>
</div>


@endsection