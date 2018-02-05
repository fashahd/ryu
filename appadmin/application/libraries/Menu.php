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
                        <li>
                            <a href="'.base_url().'dashboard/front">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tags"></i> <span>Catalog</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="'.base_url().'catalog/categories"><i class="fa fa-circle-o"></i> Categories</a></li>
                                <li><a href="'.base_url().'catalog/products"><i class="fa fa-circle-o"></i> Products</a></li>
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