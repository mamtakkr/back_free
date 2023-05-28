@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Country')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin-index')}}">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('countries-index')}}">{{__('public.Country')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Add_Country')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body bg-ytr">
                            @if($message=Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif<br>
                            <div class="tab-pane ladre" id="settings">
                                <form method="post" action="{{route('country-store')}}" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.Name')}}<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="{{__('public.Name')}}" value="{{old('name')}}">
                                        </div>
                                        @error('name') <span style="color:red;">{{ $message }}</span> @enderror </div>
                                    </div>
                                    <div class="sumiy form-group row">
                                        <div class="offset-sm-2 col-sm-12">
                                            <button type="submit" class="btn btn-primary">{{__('public.Save')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection