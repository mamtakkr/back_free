@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$member->username}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$member->username}}</li>
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
                                        <div class="row emi_row">
                                            <div class="col-md-6">
                                                <h1>He</h1>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Email:</b></h4>
                                                    </div>
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->email)) {{$member->email}} @else {{'N/A'}} @endif</p>
                                                    </div> 
                                                </div>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Experience:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->experience)) {{$member->experience}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>    
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>You Are:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->you_are)) {{$member->you_are}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>  
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Who Am I:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->who_i)) {{$member->relUserDetail->who_i}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div> 
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Date Of Birth:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->dob)) {{$member->relUserDetail->dob}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Age:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->age)) {{$member->relUserDetail->age}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->size)) {{$member->relUserDetail->size}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div> 
                                                
                                                 <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Weight:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->weight)) {{$member->relUserDetail->weight}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div> 
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Hair Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->hair_size)) {{$member->relUserDetail->hair_size}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Hair Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->hair_color)) {{$member->relUserDetail->hair_color}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Eye Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->eye_color)) {{$member->relUserDetail->eye_color}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Origin:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->origin)) {{$member->relUserDetail->origin}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                         <h4><b>Country:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->country)) {{$member->relUserDetail->country}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>City:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->city)) {{$member->relUserDetail->city}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Sillhouette:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> @if(!empty($member->relUserDetail->sillhouette)) {{$member->relUserDetail->sillhouette}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <br>

                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Research:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($member->relUserDetail->research)) {{$member->relUserDetail->research}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Type Of Meeting:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($member->relUserDetail->type_of_meeting)) {{$member->relUserDetail->type_of_meeting}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>First Meeting:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($member->relUserDetail->first_meeting)) {{$member->relUserDetail->first_meeting}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Vibe:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> @if(!empty($member->relUserDetail->vibe)) {{$member->relUserDetail->vibe}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                       
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>About:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> @if(!empty($member->relUserDetail->about)) {{$member->relUserDetail->about}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                 
                                              
                                            </div>
                                                
                                                    <!--<h4><b>Address:</b></h4>-->
                                            <!--    </div>-->
                                            <!--</div> -->
                                            @if(!empty($member->relUserDetail->dob_couple))
                                            <div class="col-md-6">
                                                <h1>She</h1>
                                                
                                                    
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Who I:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->dob_couple)) {{$member->relUserDetail->dob_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Date Of Birth:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->who_i_couple)) {{$member->relUserDetail->who_i_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Age:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->age_couple)) {{$member->relUserDetail->age_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->size_couple)) {{$member->relUserDetail->size_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Weight:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->weight_couple)) {{$member->relUserDetail->weight_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Hair Size:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->hair_size_couple)) {{$member->relUserDetail->hair_size_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Hair Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                         <p> @if(!empty($member->relUserDetail->hair_color_couple)) {{$member->relUserDetail->hair_color_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Eye Color:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->eye_color_couple)) {{$member->relUserDetail->eye_color_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                        <h4><b>Origin:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                       <p> @if(!empty($member->relUserDetail->origin_couple)) {{$member->relUserDetail->origin_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Country:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                      <p> @if(!empty($member->relUserDetail->country_couple)) {{$member->relUserDetail->country_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>City:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->city_couple)) {{$member->relUserDetail->city_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row emi_row">
                                                    <div class="col-3 trta">
                                                       <h4><b>Sillhouette:</b></h4>
                                                    </div>   
                                                    <div class="col-3 text_tre">
                                                        <p> @if(!empty($member->relUserDetail->sillhouette_couple)) {{$member->relUserDetail->sillhouette_couple}} @else {{'N/A'}} @endif</p>
                                                    </div>
                                                </div>
                                                   
                                                
                                            </div>
                                            @endif
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