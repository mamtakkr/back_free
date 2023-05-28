@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Messages')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Messages')}}</li>
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
                                                <th>{{__('public.Date')}}</th>
                                                <th>{{__('public.Sender')}}</th>
                                                <th>{{__('public.Receiver')}}</th>
                                                <th>{{__('public.Message')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($messages as $row)
                                            <tr>
                                                <td>{{date('d-M-Y', strtotime($row->created_at))}}</td>
                                                <td>{{$row->relSender->username}}</td>
                                                <td>{{$row->relReceiver->username}}</td>
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