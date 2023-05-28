@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('public.Videos')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('public.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('public.Videos')}}</li>
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
                                                <th>{{__('public.Username')}}</th>
                                                <th>{{__('public.Video_url')}}</th>
                                                <th>{{__('public.Action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($videos as $row)
                                            <tr>
                                                <td>{{date('d-M-Y', strtotime($row->created_at))}}</td>
                                                <td>@if(!empty($row->relUser->username)) {{$row->relUser->username}} @endif</td>
                                                <td>
                                                @if(!empty($row->video_url))
                                                <video class="rounded sidebarVideoGallery" controls controlsList="nodownload" height="100" width="100">
                                                  <source src="{{URL::to('/')}}/public/videos/{{$row->video_url}}" type="video/mp4">
                                                </video>
                                                @endif
                                                </td>
                                                <td id="photo_status{{$row->id}}">
                                                    <select id="status" onchange="updateStatus({{$row['id']}},this.selectedIndex)" name="status">
                                                        <option value="pending" <?php if ($row['status'] == 'pending') echo "Selected"; ?>>{{__('public.Pending')}}</option>
                                                        <option value="approved" <?php if ($row['status'] == 'approved') echo "Selected"; ?>>{{__('public.Approved')}}</option>
                                                        <option value="declined" <?php if ($row['status'] == 'declined') echo "Selected"; ?>>{{__('public.Declined')}}</option>
                                                    </select>
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
<script>
    
    function updateStatus(id, selectedId) {
        console.log(id)
        var _token = "{{csrf_token()}}";
        var status = document.getElementById('status').options[selectedId].value;
        var qs = {
            id: id,
            status: status,
            _token: _token
        };
        
        $.ajax({
            url: "{{route('status-videos-update')}}",
            method: "POST",
            data: qs,
            success: function(result) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(result.message);
                $('#photo_status'+id).load(location.href + ' #photo_status'+id);
            },
            error: function(request, status, error) {
                console.log('Error is' + request.responseText);
            }
        });
    }
</script>
@endsection