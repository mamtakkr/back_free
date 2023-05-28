@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Dashboard')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Dashboard')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$counters['reg_members']}}</h3>
                            <p>{{__('public.Registered_Members')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('members-show')}}" class="small-box-footer">{{__('public.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$counters['pen_members']}}</h3>
                            <p>{{__('public.Pending_Members')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('pending-members-show')}}" class="small-box-footer">{{__('public.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$counters['reg_professionals']}}</h3>
                            <p>{{__('public.Registered_Professionals')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('professionals-show')}}" class="small-box-footer">{{__('public.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$counters['pen_professionals']}}</h3>
                            <p>{{__('public.Pending_Professionals')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('pending-professionals-show')}}" class="small-box-footer">{{__('public.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$counters['contacts']}}</h3>
                            <p>{{__('public.Contact_Enquiries')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('contacts-show')}}" class="small-box-footer">{{__('public.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection