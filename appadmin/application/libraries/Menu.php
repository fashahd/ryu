<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu {   
        public function treemenu(){
            $ret = '
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="'.base_url().'dashboard/front">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="'.base_url().'categories">
                                <i class="fa fa-camera-retro"></i> <span>Media</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="'.base_url().'categories">
                                <i class="ion ion-bag"></i> <span>Products</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> All Products</a></li>
                                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add New</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="'.base_url().'categories">
                                <i class="fa fa-folder-open"></i> <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="'.base_url().'categories">
                                <i class="fa fa-clone"></i> <span>Pages</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-users"></i> <span>Users</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> All Users</a></li>
                                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add New</a></li>
                                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Your Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            ';
            return $ret;
        }
    }
?>