<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Layout {
        
    
        public function content($view,$data = null){
            $CI =   &get_instance();
            $data["pages"]  = $view;
            $CI->load->view("templates/content",$data);
        }

        public function headersource($module = null){
            $ret = '
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>AdminPage | '.$module.'</title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                <!-- Bootstrap 3.3.7 -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/bootstrap/dist/css/bootstrap.min.css">
                <!-- Font Awesome -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/font-awesome/css/font-awesome.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/Ionicons/css/ionicons.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="'.base_url().'appsources/dist/css/AdminLTE.min.css">
                <!-- AdminLTE Skins. Choose a skin from the css/skins
                    folder instead of downloading all of them to reduce the load. -->
                <link rel="stylesheet" href="'.base_url().'appsources/dist/css/skins/_all-skins.min.css">
                <!-- Morris chart -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/morris.js/morris.css">
                <!-- jvectormap -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/jvectormap/jquery-jvectormap.css">
                <!-- Date Picker -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
                <!-- Bootstrap time Picker -->
                <link rel="stylesheet" href="'.base_url().'appsources/plugins/timepicker/bootstrap-timepicker.min.css">
                <!-- Daterange picker -->
                <link rel="stylesheet" href="'.base_url().'appsources/bower_components/bootstrap-daterangepicker/daterangepicker.css">
                <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="'.base_url().'appsources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
                <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="'.base_url().'appsources/custom.css">
                <!-- jQuery 3 -->
                <script src="'.base_url().'appsources/bower_components/jquery/dist/jquery.min.js"></script>
            
                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
            
                <!-- Google Font -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            </head>
            ';

            return $ret;
        }

        function headersourcejs(){
            $ret = '
            <!-- jQuery 3 -->
            <script src="'.base_url().'appsources/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="'.base_url().'appsources/bower_components/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
              $.widget.bridge("uibutton", $.ui.button);
            </script>
            <!-- Bootstrap 3.3.7 -->
            <script src="'.base_url().'appsources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- Morris.js charts -->
            <script src="'.base_url().'appsources/bower_components/raphael/raphael.min.js"></script>
            <script src="'.base_url().'appsources/bower_components/morris.js/morris.min.js"></script>
            <!-- Sparkline -->
            <script src="'.base_url().'appsources/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
             <!-- daterangepicker -->
            <script src="'.base_url().'appsources/bower_components/moment/min/moment.min.js"></script>
            <script src="'.base_url().'appsources/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!-- datepicker -->
            <script src="'.base_url().'appsources/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <!-- bootstrap time picker -->
            <script src="'.base_url().'appsources/plugins/timepicker/bootstrap-timepicker.min.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="'.base_url().'appsources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <!-- Slimscroll -->
            <script src="'.base_url().'appsources/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="'.base_url().'appsources/bower_components/fastclick/lib/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="'.base_url().'appsources/dist/js/adminlte.min.js"></script>
            <script src="'.base_url().'appsources/jquery.form.js"></script>
            <script src="'.base_url().'appsources/imagesloaded.pkgd.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="'.base_url().'appsources/dist/js/demo.js"></script>
            <script src="'.base_url().'appsources/admin/default.js"></script>
            <script src="'.base_url().'appsources/admin/appadmin.js"></script>
            <script>
                //Date picker
                $("#datepicker").datepicker({
                    format: "yyyy-mm-dd",
                    minDate: 0,
                })
            </script>
            <script>
                //Timepicker
                $(".timepicker").timepicker({
                showInputs: false
                })
            </script>
            ';
            return $ret;
        }
    }
?>