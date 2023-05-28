@extends('layouts.admin')
@section('content')

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
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
                <div class="bg-ytr col-8 m-auto">
    				<form method="post" action="{{route('password-update-action')}}" enctype="multipart/form-data" class="form-horizontal">
    					@csrf
    					<input type="hidden" name="_method" value="Patch" />
    					<input type="hidden" name="id" value="{{old('id',Auth::user()->id)}}">
    
    					<div class="col-sm-12">
    						<div class="from_add">
    							<label for="lname">New Password:</label>
    							<input type="password" id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password"><br>
    							<label for="lname">Confirm Password:</label>
    							<input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required><br><br>
    						</div>
    					</div>
    					    <div class="sumiy">
    						    <button type="submit" class="btn btn-danger">Save</button>
    						</div>   
    					</div>	
    				</form> 
				</div>
            </div>
        </div>
    </section>


@endsection