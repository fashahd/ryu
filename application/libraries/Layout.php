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
                    <meta http-equiv="x-ua-compatible" content="ie=edge">
                    <title>RYU | '.$module.'</title>
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="canonical" href="http://www.vmdindonesia.com" />

            
                    <!-- Favicon -->
                    <link rel="shortcut icon" type="image/x-icon" href="'.base_url().'/appsources/img/logo/ryu_logo.png">
            
                    <!-- all css here -->
                    <!-- bootstrap v3.3.6 css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/bootstrap.min.css">
                    <!-- animate css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/animate.css">
                    <!-- jquery-ui.min css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/jquery-ui.min.css">
                    <!-- meanmenu css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/meanmenu.min.css">
                    <!-- owl.carousel css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/owl.carousel.css">
                    <!-- font-awesome css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/font-awesome.min.css">
                    <!-- material-design-iconic-font.css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/material-design-iconic-font.css">
                    <!-- chosen.min.css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/chosen.min.css">
                    <!-- nivo-slider.css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/nivo-slider.css">
                    <!--flexslider.css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/flexslider.css">
                    <!-- style css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/style.css">
                    <!-- responsive css -->
                    <link rel="stylesheet" href="'.base_url().'/appsources/css/responsive.css">
                    <!-- modernizr css -->
                    <script src="'.base_url().'/appsources/js/vendor/modernizr-2.8.3.min.js"></script>
                <script src="'.base_url().'/appsources/js/vendor/jquery-1.12.0.min.js"></script>
                </head>
            ';

            return $ret;
        }

        function headersourcejs(){
            $ret = '
                <!-- all js here -->
                <!-- jquery latest version -->
                <script src="'.base_url().'/appsources/js/vendor/jquery-1.12.0.min.js"></script>
                <!-- bootstrap js -->
                <script src="'.base_url().'/appsources/js/bootstrap.min.js"></script>
                <!-- owl.carousel js -->
                <script src="'.base_url().'/appsources/js/owl.carousel.min.js"></script>
                <!-- meanmenu js -->
                <script src="'.base_url().'/appsources/js/jquery.meanmenu.js"></script>
                <!-- jquery-ui js -->
                <script src="'.base_url().'/appsources/js/jquery-ui.min.js"></script>
                <!-- wow js -->
                <script src="'.base_url().'/appsources/js/wow.min.js"></script>
                <!-- chosen.jquery.min.js -->
                <script src="'.base_url().'/appsources/js/chosen.jquery.min.js"></script>
                <!-- jquery.nivo.slider.js -->
                <script src="'.base_url().'/appsources/js/jquery.nivo.slider.js"></script>
                <!-- jquery.countdown.min.js -->
                <script src="'.base_url().'/appsources/js/jquery.countdown.min.js"></script>
                <!-- jquery.flexslider.js -->
                <script src="'.base_url().'/appsources/js/jquery.flexslider.js"></script>
                <!-- jquery.counterup.min.js -->
                <script src="'.base_url().'/appsources/js/jquery.counterup.min.js"></script>
                <!-- waypoints.min.js -->
                <script src="'.base_url().'/appsources/js/waypoints.min.js"></script>
                <!-- plugins js -->
                <script src="'.base_url().'/appsources/js/plugins.js"></script>
                <!-- main js -->
                <script src="'.base_url().'/appsources/js/main.js"></script>
            ';
            return $ret;
        }
    }
?>