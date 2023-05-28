@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Plans')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin-index')}}">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('plans')}}">{{__('public.Plans')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Edit_Plan')}}</li>
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
                                <form method="post" action="{{route('plan-update')}}" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <input type="hidden" name="_method" value="Patch" />
                                    <input type="hidden" name="id" class="form-control {{ $errors->has('body')? 'is-invalid':''}} " value="{{old('id',$plan->id)}}">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.Name')}}</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="{{__('public.Name')}}" value="{{old('name',$plan->name)}}">
                                        </div>
                                        @error('name') <span style="color:red;">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.Price')}}<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="price" class="form-control" placeholder="{{__('public.Price')}}" value="{{old('price',$plan->price)}}">
                                        </div>
                                        @error('price') <span style="color:red;">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.Trial_Days')}}<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="trial_days" class="form-control" placeholder="{{__('public.Trial_Days')}}" value="{{old('trial_days',$plan->trial_days)}}">
                                        </div>
                                        @error('trial_days') <span style="color:red;">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.Plan_Type')}}<span style="color: red;">*</span></label>
                                        <div class="col-sm-12">
                                            <select name="plan_type" class="form-control">
                                              <option value="">{{__('public.Select_Plan_Type')}}</option>
                                              <option value="monthly" @if(old('plan_type',$plan->plan_type)=="monthly" ) {{ 'selected' }} @endif>{{__('public.Monthly')}}</option>
                                              <option value="yearly" @if(old('plan_type',$plan->plan_type)=="yearly" ) {{ 'selected' }} @endif>{{__('public.Yearly')}}</option>
                                            </select>
                                        </div>
                                        @error('plan_type') <span style="color:red;">{{ $message }}</span> @enderror
                                    </div>      
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-form-label">{{__('public.des_optional')}}</label>
                                        <div class="col-sm-12">
                                            <textarea name="description" id="myeditor" class="form-control desyt" placeholder="{{__('public.Description')}}">{{old('description',$plan->description)}}</textarea>
                                        </div>
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