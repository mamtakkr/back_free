<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Panel</title>

  <!-- Bootstrap -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
<!-- Datatables -->
<link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
<link href="<?php echo e(URL::to('/')); ?>/public/admin/build/css/custom.min.css" rel="stylesheet">
  <!--Alertify CSS -->
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/assets/css/alertify.min.css" />
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
  <!-- Switch-button-bootstrap -->
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/assets/css/bootstrap-switch-button.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(route('admin-index')); ?>">
              <img src="<?php echo e(URL::to('/')); ?>/public/logo.png" alt="">
            </a>
          </div>

          <div class="clearfix"></div><br />

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="<?php echo e(route('admin-index')); ?>">Dashboard</a></li>
                <li><a><i class="fa fa-home"></i> Profile <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('profile-show')); ?>">My Profile</a></li>
                    <li><a href="<?php echo e(route('change-password-edit')); ?>">Change Password</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-home"></i> CMS <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('term-condition-edit')); ?>">Term & Condition</a></li>
                    <li><a href="<?php echo e(route('privacy-policy-edit')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo e(route('equal-ment-edit')); ?>">Equal Mentions</a></li>
                    <li><a href="<?php echo e(route('contacts-show')); ?>">Contacts</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-home"></i> Location <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('origins-index')); ?>">Origin</a></li>
                    <li><a href="<?php echo e(route('countries-index')); ?>">Country</a></li>
                    <li><a href="<?php echo e(route('cities-index')); ?>">City</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-home"></i> Events <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('event-categories')); ?>">Event Categories</a></li>
                    <li><a href="<?php echo e(route('event-types')); ?>">Event Types</a></li>
                    <li><a href="<?php echo e(route('events-pending')); ?>">Pending Events</a></li>
                    <li><a href="<?php echo e(route('events-completed')); ?>">Completed Events</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-home"></i> Users <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('members-show')); ?>">Registered Members</a></li>
                    <li><a href="<?php echo e(route('professionals-show')); ?>">Registered Professionals</a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-home"></i> Request Approval <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo e(route('pending-members-show')); ?>">Pending Members</a></li>
                    <li><a href="<?php echo e(route('pending-professionals-show')); ?>">Pending Professionals</a></li>
                  </ul>
                </li>
                
                <li><a href="<?php echo e(route('plans')); ?>"><i class="fa fa-sitemap" aria-hidden="true"></i>Plans</a></li>
                
                
                <li><a href="<?php echo e(route('index')); ?>" target="__blank"><i class="fa fa-sitemap" aria-hidden="true"></i>Visit Website</a></li>
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
                  <img src="<?php echo e(URL::to('/')); ?>/public/images/users/<?php echo e(Auth::user()->image_url); ?>" alt=""><?php echo e(get_admin()->first_name); ?> <?php echo e(get_admin()->last_name); ?>

                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo e(route('profile-show')); ?>"> Profile</a></li>
                  <li><a href="<?php echo e(route('change-password-edit')); ?>">Change Password</a></li>
                  <li>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i>
                      <?php echo e(__('Logout')); ?>

                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo csrf_field(); ?>
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

        <?php echo $__env->yieldContent('content'); ?>
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
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/Flot/jquery.flot.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/Flot/jquery.flot.time.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/moment/min/moment.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo e(URL::to('/')); ?>/public/admin/build/js/custom.min.js"></script>

  <script src="<?php echo e(URL::to('/')); ?>/public/assets/js/sweetalert.min.js"></script>
  <!--Alertify JavaScript -->
  <script src="<?php echo e(URL::to('/')); ?>/public/assets/js/alertify.min.js"></script>

  <!-- Switch-button-bootstrap -->
  <script src="<?php echo e(URL::to('/')); ?>/public/assets/js/bootstrap-switch-button.js"></script>
<script>
$('.datatable-checkbox').dataTable( {
      paging: true,
      // "bDestroy": true
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
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("Your Record has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your Record is safe!");
          }
        });
    });
  </script>



</body>

</html><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/layouts/admin.blade.php ENDPATH**/ ?>