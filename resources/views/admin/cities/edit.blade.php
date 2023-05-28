@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.City')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin-index')}}">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cities-index')}}">{{__('public.City')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Edit_City')}}</li>
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
                                <form method="post" action="{{route('city-update')}}" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <input type="hidden" name="_method" value="Patch" />
                                    <input type="hidden" name="id" class="form-control {{ $errors->has('body')? 'is-invalid':''}} " value="{{old('id',$city->id)}}">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.Country_Name')}}</label>
                                        <div class="col-sm-12">
                                            <select id="country_id" name="country_id" class="form-control">
                                                <option value="">{{__('public.Select_Country')}}</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($country->id==$city->country_id) selected @endif >{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('country_id') <span style="color:red;">{{ $message }}</span> @enderror </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.City_Name')}}</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="{{__('public.City_Name')}}" value="{{old('name',$city->name)}}">
                                        </div>
                                        @error('name') <span style="color:red;">{{ $message }}</span> @enderror </div>
                                    </div>
                                    <div class="sumiy form-group row">
                                        <div class="offset-sm-2 col-sm-12">
                                            <button type="submit" class="btn btn-primary">{{__('public.Update')}}</button>
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