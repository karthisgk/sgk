<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App title -->
        <title>Login</title>

        <!-- App CSS -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
 

    </head>

    <?php 
        $u_name = '';
        if(isset($_SESSION['front_username']))
            $u_name = $_SESSION['front_username'];
    ?>

    <body class="login-theme1">

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

            <div class="account-bg">
                <div class="card-box m-b-0">
                    <div class="text-xs-center m-t-20">
                        <a href="<?php echo base_url(); ?>" class="logo">
                            <span>Login</span>
                        </a>
                    </div>
                    <div class="m-t-30 m-b-20">
                        
                        <form class="form-horizontal m-t-20" method="POST" action="<?=$this->url;?>checklogin/" id="login_form">

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input name="email" class="form-control" type="text" maxlength="50" required="" placeholder="Enter Username" value="<?php echo $u_name;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" name="password"  type="password" maxlength="15" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group text-center m-t-30">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary" type="submit" onclick="return login_valid();">Log In</button>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <!-- end card-box-->

        </div>
        <!-- end wrapper page -->


        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#login_form').parsley();
            });

            function login(){

                $('#login_form').submit();
            }

            function login_valid(){
                $('#login_form').parsley().validate();

                if($('#login_form').parsley().validate()){
                    login();
                }
            }

            toastr.options = {
                "closeButton": false,
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
        <?php if($this->session->flashdata('flash') != '') { ?>
        <!-- Toastr js -->
        
            <script type="text/javascript">
                Command: toastr["<?php echo $this->session->flashdata('flashtype'); ?>"]("<?php echo $this->session->flashdata('flash'); ?>");
            </script>
        <?php } ?>

    </body>
</html>