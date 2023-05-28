@extends('layouts.admin')
@section('content')

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
				
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
                <div class="col-sm-12">
			
				@if(count($errors)>0)
				<div class='alert alert-danger'>
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
				@endif<br>
                
                    <div class="bg-ytr col-4 m-auto"> 
        			   	<form method="post" action="{{route('profileImg-update-action')}}" enctype="multipart/form-data" class="form-horizontal">
        					@csrf
        					<input type="hidden" name="_method" value="Patch" />
        					<input type="hidden" name="id" value="{{old('id',Auth::user()->id)}}">
        
        					
        					<div class="col-sm-12">
        						<div class="profile">
        							<img class="img-thumbnail" src="{{ URL::to('/') }}/public/images/users/{{Auth::user()->image_url}}" id="output" alt="..." height="100" width="100">
        							<input type="hidden" name="old_image_url" value="df" class="form-control"><br>
        							<input type="file" name="new_image_url" id="image" accept="image/*" onchange="loadFile(event)">
        							<script>
        								var loadFile = function(event) {
        									var image = document.getElementById('output');
        									image.src = URL.createObjectURL(event.target.files[0]);
        									$('#output').slideDown();
        								};
        							</script>	
        						</div>
        					</div>
        					<div class="sumiy">
        						<button type="submit" class="btn btn-danger">Update</button>
        					</div>	
        				</form> 
        			</div>	
                
                   <div class="bg-ytr col-8 m-auto"> 
    			   	<form method="post" action="{{route('profile-update-action')}}" enctype="multipart/form-data" class="form-horizontal">
    					@csrf
    					<input type="hidden" name="_method" value="Patch" />
    					<input type="hidden" name="id" value="{{old('id',Auth::user()->id)}}">
    
    
    					<div class="col-sm-12">
    						<div class="from_add">
    							<label for="email">Email:</label>
    							<input type="email" id="email" name="email" value="{{Auth::user()->email}}"><br>
    							<label for="fname">First name:</label>
    							<input type="text" id="first_name" name="first_name" value="{{Auth::user()->first_name}}"><br>
    							<label for="lname">Last name:</label>
    							<input type="text" id="last_name" name="last_name" value="{{Auth::user()->last_name}}"><br>
    							<label for="username">Username:</label>
    							<input type="text" id="username" name="username" value="{{Auth::user()->username}}"><br>
    						</div>
    					</div>
    					<div class="sumiy">
    						<button type="submit" class="btn btn-danger">Update</button>
    					</div>	
    				</form> 
    			</div>	
    				
            </div>
        </div><!-- /.container-fluid -->
    </section>


@endsection