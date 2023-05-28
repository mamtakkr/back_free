<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ __('public.Admin_Panel') }}</title>

  <!-- Bootstrap -->
  <link href="{{URL::to('/')}}/public/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{URL::to('/')}}/public/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{URL::to('/')}}/public/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{URL::to('/')}}/public/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{URL::to('/')}}/public/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{URL::to('/')}}/public/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="{{URL::to('/')}}/public/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
<!-- Datatables -->
<link href="{{URL::to('/')}}/public/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="{{URL::to('/')}}/public/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="{{URL::to('/')}}/public/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="{{URL::to('/')}}/public/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="{{URL::to('/')}}/public/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom Theme Style -->
<link href="{{URL::to('/')}}/public/admin/build/css/custom.min.css" rel="stylesheet">
  <!--Alertify CSS -->
<link rel="stylesheet" href="{{URL::to('/')}}/public/assets/css/alertify.min.css" />
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
  <!-- Switch-button-bootstrap -->
<link rel="stylesheet" href="{{URL::to('/')}}/public/assets/css/bootstrap-switch-button.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin-index')}}">
              <img src="{{URL::to('/')}}/public/logo.png" alt="">
            </a>
          </div>

          <div class="clearfix"></div><br />

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="{{route('admin-index')}}">{{ __('public.Dashboard') }}</a></li>
                <li><a><i class="fa fa-user-o"></i> {{ __('public.Profile') }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('profile-show')}}">{{ __('public.My_Profile') }}</a></li>
                    <li><a href="{{route('change-password-edit')}}">{{ __('public.Change_Password') }}</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-cogs" aria-hidden="true"></i> {{ __('public.CMS') }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('term-condition-edit')}}">{{ __('public.Term_Condition') }}</a></li>
                    <li><a href="{{route('privacy-policy-edit')}}">{{ __('public.Privacy_Policy') }}</a></li>
                    <li><a href="{{route('equal-ment-edit')}}">{{ __('public.Equal_Mentions') }}</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-map-marker" aria-hidden="true"></i> {{ __('public.Location') }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('origins-index')}}">{{ __('public.Origin') }}</a></li>
                    <li><a href="{{route('countries-index')}}">{{ __('public.Country') }}</a></li>
                    <li><a href="{{route('cities-index')}}">{{ __('public.City') }}</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-calendar" aria-hidden="true"></i> {{ __('public.Events') }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('event-categories')}}">{{ __('public.Event_Categories') }}</a></li>
                    <li><a href="{{route('event-types')}}">{{ __('public.Event_Types') }}</a></li>
                    <li><a href="{{route('events-pending')}}">{{ __('public.Pending_Events') }}</a></li>
                    <li><a href="{{route('events-completed')}}">{{ __('public.Completed_Events') }}</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-users" aria-hidden="true"></i> {{ __('public.Users') }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('members-show')}}">{{ __('public.Registered_Members') }}</a></li>
                    <li><a href="{{route('professionals-show')}}">{{ __('public.Registered_Professionals') }}</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('public.Request_Approval') }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('pending-members-show')}}">{{ __('public.Pending_Members') }}</a></li>
                    <li><a href="{{route('pending-professionals-show')}}">{{ __('public.Pending_Professionals') }}</a></li>
                  </ul>
                </li>
                
                <li><a href="{{route('plans')}}"><i class="fa fa-sitemap" aria-hidden="true"></i>{{ __('public.Plans') }}</a></li>
                <li><a href="{{route('photos-show')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>{{ __('public.Photos') }}</a></li>
                <li><a href="{{route('videos-show')}}"><i class="fa fa-video-camera" aria-hidden="true"></i>{{ __('public.Videos') }}</a></li>
                
                <li><a href="{{route('messages-show')}}"><i class="fa fa-envelope" aria-hidden="true"></i>{{ __('public.Messages') }}</a></li>
                <li><a href="{{route('contacts-show')}}"><i class="fa fa-address-book" aria-hidden="true"></i>{{ __('public.Contact_Enquiries') }}</a></li>
                
                <li><a href="{{route('index')}}" target="__blank"><i class="fa fa-globe" aria-hidden="true"></i>{{ __('public.Visit_Website') }}</a></li>
              </ul>
            </div>

          </div>

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{URL::to('/')}}/public/images/users/{{Auth::user()->image_url}}" alt="">{{get_admin()->first_name}} {{get_admin()->last_name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="{{route('profile-show')}}"> {{ __('public.Profile') }}</a></li>
                  <li><a href="{{route('change-password-edit')}}">{{ __('public.Change_Password') }}</a></li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i>
                      {{ __('public.Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <div class="right_col" role="main">

        @yield('content')
      </div>
    </div>
  </div>
  </div>

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      Designed and Development by <a href="https://gswebtech.com/" target="__blank">GS Web Technologies</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  </div>
  </div>

  <!-- jQuery -->
  <script src="{{URL::to('/')}}/public/admin/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="{{URL::to('/')}}/public/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="{{URL::to('/')}}/public/admin/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="{{URL::to('/')}}/public/admin/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="{{URL::to('/')}}/public/admin/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="{{URL::to('/')}}/public/admin/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{URL::to('/')}}/public/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="{{URL::to('/')}}/public/admin/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="{{URL::to('/')}}/public/admin/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="{{URL::to('/')}}/public/admin/vendors/Flot/jquery.flot.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/Flot/jquery.flot.time.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="{{URL::to('/')}}/public/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="{{URL::to('/')}}/public/admin/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="{{URL::to('/')}}/public/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{URL::to('/')}}/public/admin/vendors/moment/min/moment.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/jszip/dist/jszip.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="{{URL::to('/')}}/public/admin/vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="{{URL::to('/')}}/public/admin/build/js/custom.min.js"></script>

  <script src="{{URL::to('/')}}/public/assets/js/sweetalert.min.js"></script>
  <!--Alertify JavaScript -->
  <script src="{{URL::to('/')}}/public/assets/js/alertify.min.js"></script>

  <!-- Switch-button-bootstrap -->
  <script src="{{URL::to('/')}}/public/assets/js/bootstrap-switch-button.js"></script>
<script>
$('.datatable-checkbox').dataTable( {
      paging: true,
      // "bDestroy": true
      "language": {
             url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json'
          }
    } );
</script>
  
  <script>
    setTimeout(function() {
      $('#alert').slideUp();
    }, 2000);
    
    window.onload = function() {
      CKEDITOR.replace('myeditor');
    };

    
    $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
          title: "{{ __('public.Are_you_sure') }}",
          text: "{{ __('public.not_able_recover') }}",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("{{ __('public.Record_deleted') }}", {
              icon: "success",
            });
          } else {
            swal("{{ __('public.Record_safe') }}");
          }
        });
    });
  </script>



</body>

</html>