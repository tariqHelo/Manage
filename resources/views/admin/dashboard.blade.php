<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('metroinc/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{asset('metroinc/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css') }}"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="{{asset('metroinc/assets/global/css/components-md-rtl.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/global/css/plugins-md-rtl.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/admin/layout/css/layout-rtl.css') }}" rel="stylesheet" type="text/css"/>
<link id="style_color" href="{{asset('metroinc/assets/admin/layout/css/themes/darkblue-rtl.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{asset('metroinc/assets/admin/layout/css/custom-rtl.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->


@yield("css")

<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
  @include('admin.header')
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	@include('admin.sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<!-- BEGIN PAGE HEADER-->
	            @yield('content')
				<!-- END PIE CHART PORTLET-->
				<!-- END PAGE CONTENT--> 
			</div>
		</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2020 &copy; Metronic by keenthemes.<a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../global/p/assetslugins/respond.min.js"></script>
<script src="../../global/p/assetslugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{{asset('metroinc/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('metroinc/assets/global/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{asset('metroinc/assets/global/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{asset('metroinc/assets/global/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{asset('metroinc/assets/global/plugins/flot/jquery.flot.stack.min.js') }}"></script>
<script src="{{asset('metroinc/assets/global/plugins/flot/jquery.flot.crosshair.min.js') }}"></script>
<script src="{{asset('metroinc/assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('metroinc/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/pages/scripts/charts-flotcharts.js') }}"></script>
<script src="{{asset('metroinc/assets/admin/pages/scripts/table-managed.js') }}"></script>
  <!-- END THEME LAYOUT SCRIPTS -->

  <!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{asset('metroinc/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{asset('metroinc/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{asset('metroinc/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script>
jQuery(document).ready(function() {       
	Metronic.init(); // init metronic core components
	Layout.init();  //init current layout
	QuickSidebar.init();  //init quick sidebar
	Demo.init();  //init demo features
	TableManaged.init();
	});
</script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   ChartsFlotcharts.init();
   ChartsFlotcharts.initCharts();
   ChartsFlotcharts.initPieCharts();
   ChartsFlotcharts.initBarCharts();
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>