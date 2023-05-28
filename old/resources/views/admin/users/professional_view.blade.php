@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$pro_view->username}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$pro_view->username}}</li>
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
                                                    <div class="col-3 trta">
                                                        <h4><b>Email:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->email)) {{$pro_view->email}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Nickname:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->username)) {{$pro_view->username}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Club Name:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->club_name)) {{$pro_view->club_name}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Website Url:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->relUserDetail->website_url)) {{$pro_view->relUserDetail->website_url}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Contact Number:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->relUserDetail->contact)) {{$pro_view->relUserDetail->contact}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Status:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->relUserDetail->status)) {{$pro_view->relUserDetail->status}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Address:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($pro_view->relUserDetail->address)) {{$pro_view->relUserDetail->address}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Zipcode:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($pro_view->relUserDetail->zipcode)) {{$pro_view->relUserDetail->zipcode}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                 <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Country:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($pro_view->relUserDetail->country)) {{$pro_view->relUserDetail->country}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                      <h4><b>City:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($pro_view->relUserDetail->city)) {{$pro_view->relUserDetail->city}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                      <h4><b>About:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($pro_view->relUserDetail->about)) {{$pro_view->relUserDetail->about}} @else {{'N/A'}} @endif</p>

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