@extends('layouts.front')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 style="text-align:center; color:#fff;">{{__('public.Blacklisted_Members')}}</h1>
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
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    @if($members->count()>0)
                                    <table class="table table-striped table-bordered bulk_action datatable-checkbox" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>{{__('public.Profile_Picture')}}</th>
                                                <th>{{__('public.Nickname')}}</th>
                                                <th>{{__('public.Action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($members as $row)
                                            <tr>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            @if(!empty($row->relUser->image_url))
                                                            <img alt="Avatar" class="table-avatar" src="{{URL::to('/')}}/public/images/users/{{$row->relUser->image_url}}" height="50" width="50">
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>{{$row->relUser->username}}</td>
                                                
                                                <td>
                                                    <form name="myForm" method="POST" action="{{route('blacklist-delete',$row['id'])}}" class="float-right">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="Delete" />
                                                        <a href="#" data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm dltBtn" data-id="{{$row->id}}">
                                                           {{__('public.Unblock')}}
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    @else
                                    {{__('public.No_record_found')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    
$(document).ready( function () {
    $('#table_id').DataTable({
      "language": {
             url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json'
          }
    });
});

    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "{{ __('public.Are_you_sure') }}",
          text: "{{ __('public.unblock_this_user') }}",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("{{ __('public.member_unblocked') }}", {
              icon: "success",
            });
          } else {
            swal("{{ __('public.Record_safe') }}");
          }
        });
    });
</script>
@endsection