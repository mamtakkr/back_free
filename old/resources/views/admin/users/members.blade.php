@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Members</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin-index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Members</li>
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
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>You Are</th>
                                                    <th>Experience</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($members as $row)
                                                <tr>
                                                    <td>{{$row->username}}</td>
                                                    <td>{{$row->email}}</td>
                                                    <td>{{$row->you_are}}</td>
                                                    <td>{{$row->experience}}</td>
                                                    <td>
                                                        <select id="active_status" onchange="updateStatus({{$row['id']}},this.selectedIndex)" name="active_status">
                                                            <option value="active" <?php if ($row['active_status'] == 'active') echo "Selected"; ?>>Active</option>
                                                            <option value="inactive" <?php if ($row['active_status'] == 'inactive') echo "Selected"; ?>>Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="{{route('member-view',$row['id'])}}"><i class="fa fa-eye"></i></a>
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
        var active_status = document.getElementById('active_status').options[selectedId].value;
        var qs = {
            id: id,
            status: active_status,
            _token: _token
        };
        
        $.ajax({
            url: "{{route('user-update-active-status')}}",
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