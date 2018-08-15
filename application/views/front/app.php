<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured  Admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="icon" href="<?=base_url();?>assets/images/users/Avatar.jpg" type="image/x-icon"/>

        <!-- App title -->
        <title>Sample</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?=base_url();?>assets/plugins/morris/morris.css">

        <!-- Switchery css -->
        <link href="<?=base_url();?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <link href="<?=base_url();?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url(); ?>assets/plugins/jQuery-Extended-Bootstrap-Tabs/css/bootstrap-tabs-x.css" rel="stylesheet" type="text/css" />

        <!-- data tables -->
        <link href="<?=base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?=base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="<?=base_url(); ?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />

        <!-- Sweet Alert css -->
        <link href="<?=base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />

        <!-- date picker -->
        <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"/>

        <!-- select2 -->
        <link href="<?=base_url(); ?>assets/plugins/select2/assets/css/select2.css" rel="stylesheet" />
        
        <!-- App CSS -->
        <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
         

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Modernizr js -->
        <script src="<?=base_url();?>assets/js/modernizr.min.js"></script>
        <!-- jQuery  -->
        <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
        <!-- Tether for Bootstrap -->
        <script src="<?=base_url();?>assets/js/tether.min.js"></script>
        <!-- bootstrap -->
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
 
        <script type="text/javascript">
            var homeBaseURL = '<?=base_url();?>';
        </script>
    </head>


    <body class="widescreen fixed-left-void">

        <!-- Begin page -->
        <div id="wrapper" class="forced enlarged">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="#" class="logo">
                        <i class="zmdi zmdi-group-work icon-c-logo"></i>
                        <span>Sample</span></a>
                </div>


                <nav class="navbar navbar-custom">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        <li class="nav-item hidden-mobile">
                            <form role="search" class="app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav pull-right">
                        
                        <li class="nav-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="<?=base_url();?>assets/images/users/Avatar.jpg" alt="user" class="img-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown" aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome Admin</small> </h5>
                                </div>
                                <!-- item-->
                                <a href="<?=$this->login_url;?>logout" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="has_sub">
                                <a href="<?=base_url();?>editor" class="waves-effect"><i class="fa fa-edit"></i><span> Editor </span> </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->

        <!-- header & footer -->

        	<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
			    <!-- Start content -->
			    <div class="content">
			        <div class="container">

			            <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
			                        <h4 class="page-title"><?=isset($page_title) ? $page_title : 'PAGE TITLE'; ?></h4>
			                        <ol class="breadcrumb p-0">
			                            <li>
			                                <a href="#">Home</a>
			                            </li>
			                            <li>
			                                <a href="#"><?=isset($page_title) ? $page_title : 'PAGE TITLE'; ?></a>
			                            </li>
			                        </ol>
			                        <div class="clearfix"></div>
			                    </div>
							</div>
						</div>

						<?=$main;?>

			        </div>
			    </div>
			</div>

        </div>
        <!-- END wrapper -->
        

        <input type="hidden" id="siteurl" value="<?=base_url();?>yaanai/" />
        <script src="<?=base_url(); ?>assets/plugins/jQuery-Extended-Bootstrap-Tabs/js/bootstrap-tabs-x.js"></script>        
        <script src="<?=base_url();?>assets/js/detect.js"></script>
        <script src="<?=base_url();?>assets/js/fastclick.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.blockUI.js"></script>
        <script src="<?=base_url();?>assets/js/waves.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url();?>assets/plugins/switchery/switchery.min.js"></script>

        <!-- sortable -->
        <script src="<?=base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

        <script src="<?=base_url(); ?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

        <!--Morris Chart-->
        <!-- <script src="<?=base_url();?>assets/plugins/morris/morris.min.js"></script> -->
        <script src="<?=base_url();?>assets/plugins/raphael/raphael-min.js"></script>

        <!-- Counter Up  -->
        <script src="<?=base_url();?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?=base_url();?>assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- toastr flash alert -->
        <script src="<?=base_url();?>assets/plugins/toastr/toastr.min.js"></script>

        <!-- date picker -->
        <script src="<?=base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <!-- data tables -->
        <script src="<?=base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- select 2 -->
        <script src="<?=base_url(); ?>assets/plugins/select2/assets/js/select2.full.js"></script>

        <!-- Responsive examples -->
        <script src="<?=base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Sweet Alert js -->
        <script src="<?=base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

        <!-- bootstrap_confirmation -->
        <script src="<?=base_url(); ?>assets/plugins/Bootstrap-Confirmation-master/bootstrap-confirmation.js" type="text/javascript"></script>
        
        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?=base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>

        <!-- App js -->
        <script src="<?=base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.app.js"></script>

        <!-- custom script -->
        <script src="<?=base_url();?>assets/js/custom.js" type="text/javascript"></script>
        <!-- Page specific js -->
        <!-- <script src="<?=base_url();?>assets/pages/jquery.dashboard.js"></script> -->

        <script type="text/javascript">
            
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
        <?php if($this->session->flashdata('flash') != ''){
            $msg = $this->session->flashdata('flash');
        ?>
        <!-- Toastr js -->
        
            <script type="text/javascript">
                Command: toastr["<?=$this->session->flashdata('flashtype');?>"]("<?=$msg;?>");
            </script>
        <?php } ?>

    </body>
</html>