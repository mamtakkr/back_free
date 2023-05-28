@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Contacts')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Contacts')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox">
                                        <thead>
                                            <tr>
                                                <th>{{__('public.Email')}}</th>
                                                <th>{{__('public.Title')}}</th>
                                                <th>{{__('public.Message')}}</th>
                                                <th>{{__('public.Date')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $row)
                                            <tr>
                                                <td>{{$row['email']}}</td>
                                                <td>{{$row['title']}}</td>
                                                <td>
                                                    <?php
                                                    $string = $row['message'];
                                                    $string = strip_tags($string);
                                                    $character_count = strlen($string);
                                                    ?>
                                                    @if($character_count > 250)
                                                    {!!substr($row['message'], 0,250)!!}...
                                                    @else
                                                    {!!$row['message']!!}
                                                    @endif
                                                </td>
                                                <td>{{date('d-M-Y', strtotime($row->created_at))}}</td>
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
    </section>
</div>

@endsection