@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div align="right">
                        <a href="{{route('slider-create')}}" class="btn btn-primary">Add New Slider</a><br>
                    </div>
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
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sliders as $row)
                                            <tr>
                                                <td>{{$row['title']}}</td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            @if(!empty($row->image_url))
                                                            <img alt="Avatar" class="table-avatar" src="{{URL::to('/')}}/public/images/sliders/{{$row->image_url}}" height="50" width="50">
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="toogle" value="{{$row->id}}" data-toggle="switchbutton" {{$row['status']=='show' ? 'checked' : ''}} data-onlabel="show" data-offlabel="&nbsp; hide" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="{{route('slider-edit',$row['id'])}}"><i class="fa fa-edit"></i></a>
                                                    <form name="myForm" method="POST" action="{{route('slider-delete',$row['id'])}}" class="float-right">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="Delete" />
                                                        <a href="#" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm dltBtn" data-id="{{$row->id}}">
                                                            <i class="fa fa-trash"></i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {!! $sliders->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('input[name=toogle]').change(function() {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{ route('ajax-slider-status-update') }}",
                method: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id
                },
                success: function(result) {
                    if (result.status) {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(result.msg);
                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error("Please Try Again!");
                    }
                },
                error: function(request, status, error) {
                    console.log('Error is' + request.responseText);
                }
            });
        });
    });
</script>
@endsection