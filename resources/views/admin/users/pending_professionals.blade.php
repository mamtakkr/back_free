@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Professionals')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin-index')}}">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Professionals')}}</li>
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
                                        <table class="table table-striped table-bordered bulk_action datatable-checkbox" id="user_update">
                                            <thead>
                                                <tr>
                                                    <th>{{__('public.Nickname')}}</th>
                                                    <th>{{__('public.Email')}}</th>
                                                    <th>{{__('public.Club_Name')}}</th>
                                                    <th>{{__('public.Status')}}</th>
                                                    <th style="width: 10%;">{{__('public.Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($professionals as $row)
                                                <tr>
                                                    <td>{{$row->username}}</td>
                                                    <td>{{$row->email}}</td>
                                                    <td>{{$row->club_name}}</td>
                                                    <td>
                                                        @if($row['approved_status']!='approved')
                                                        <select id="approved_status" onchange="updateStatus({{$row['id']}},this.selectedIndex)" name="approved_status">
                                                            <option value="pending" <?php if ($row['approved_status'] == 'pending') echo "Selected"; ?>>{{__('public.Pending')}}</option>
                                                            <option value="approved" <?php if ($row['approved_status'] == 'approved') echo "Selected"; ?>>{{__('public.Approved')}}</option>
                                                            <option value="declined" <?php if ($row['approved_status'] == 'declined') echo "Selected"; ?>>{{__('public.Declined')}}</option>
                                                        </select>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="{{route('pro-view',$row['id'])}}"><i class="fa fa-eye"></i></a>
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
<script>
    function updateStatus(id, selectedId) {
        var _token = "{{csrf_token()}}";
        var approved_status = document.getElementById('approved_status').options[selectedId].value;
        var qs = {
            id: id,
            status: approved_status,
            _token: _token
        };
        
        $.ajax({
            url: "{{route('user-update-approved-status')}}",
            method: "POST",
            data: qs,
            success: function(result) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(result.message);
                $('#user_update').load(location.href + ' #user_update');
            },
            error: function(request, status, error) {
                console.log('Error is' + request.responseText);
            }
        });
    }
</script>

@endsection