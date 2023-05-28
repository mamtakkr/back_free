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
                                    <div class="data-scroll">
                                        <table class="table table-striped table-bordered bulk_action datatable-checkbox">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Title</th>
                                                    <th>Event Type</th>
                                                    <th>Event Category</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($events as $row)
                                                <tr>
                                                    <td>@if(!empty($row->relAllUser->username)) {{$row->relAllUser->username}} @endif</td>
                                                    <td>{{$row->title}}</td>
                                                    <td>{{$row->event_type}}</td>
                                                    <td>{{$row->event_category}}</td>
                                                    <td>{{date("d-M-Y", strtotime($row->start_date))}}</td>
                                                    <td>{{date("d-M-Y", strtotime($row->end_date))}}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="{{route('completed-event-view',$row['id'])}}"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
    
                                        </table>
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