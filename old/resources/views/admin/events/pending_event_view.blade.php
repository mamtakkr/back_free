@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin-index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if($error=Session::get('error'))
                    <div class="alert bg-red alert-dismissible" role="alert" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $error }}
                    </div>

                    @endif
                    @if($message=Session::get('success'))
                    <div class="alert bg-green alert-dismissible" role="alert" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $message }}
                    </div>

                    @endif<br>
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row emi_row">
                                                    <div class="col-6 trta">
                                                        <h4><b>Username</b></h4>
                                                        <h4><b>Title</b></h4>
                                                        <h4><b>Event Type</b></h4>
                                                        <h4><b>Event Category</b></h4>
                                                        <h4><b>Address</b></h4>
                                                        <h4><b>Postal Code</b></h4>
                                                        <h4><b>Town</b></h4>
                                                        <h4><b>Email</b></h4>
                                                        <h4><b>Start Date</b></h4>
                                                        <h4><b>End Date</b></h4>
                                                        <h4><b>Registration Deadline</b></h4>
                                                        <h4><b>Registration Limit</b></h4>
                                                        <h4><b>Organizer</b></h4>
                                                        <h4><b>Couples</b></h4>
                                                        <h4><b>Women</b></h4>
                                                        <h4><b>Men</b></h4>
                                                        <h4><b>Transgender</b></h4>
                                                        <h4><b>Total Participants</b></h4>
                                                    </div>
                                                    <div class="col-6 text_tre">
                                                        <p> @if(!empty($event->relAllUser->username)) {{$event->relAllUser->username}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->title)) {{$event->title}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->event_type)) {{$event->event_type}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->event_category)) {{$event->event_category}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->address)) {{$event->address}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->postal_code)) {{$event->postal_code}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->town)) {{$event->town}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->email)) {{$event->email}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->start_date)) {{date("d-M-Y", strtotime($event->start_date))}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->end_date)) {{date("d-M-Y", strtotime($event->end_date))}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->registration_deadline)) {{date("d-M-Y", strtotime($event->registration_deadline))}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->registration_limit)) {{$event->registration_limit}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->organizer)) {{$event->organizer}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->couples)) {{$event->couples}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->women)) {{$event->women}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->men)) {{$event->men}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->transgender)) {{$event->transgender}} @else {{'N/A'}} @endif</p>
                                                        <p> @if(!empty($event->total_participates)) {{$event->total_participates}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                        </div>    
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection