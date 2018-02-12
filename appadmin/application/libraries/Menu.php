<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu {   
        public function treemenu(){
            $menulist = "";
            $CI =   &get_instance();
            $sql = "SELECt * FROM ryu_menu where menu_parent_id = '0' and editable = 'ya'";
            $query = $CI->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $menulist .= '
                        <li><a href="'.base_url().'page/setting/'.$row->menu_id.'"><i class="fa fa-circle-o"></i> '.$row->menu_title.'</a></li>
                    ';
                }
            }
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
                                <li><a href="'.base_url().'catalog/subcategories"><i class="fa fa-circle-o"></i> Sub Categories</a></li>
                                <li><a href="'.base_url().'catalog/products"><i class="fa fa-circle-o"></i> Products</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bookmark"></i> <span>Pages</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                '.$menulist.'
                            </ul>
                        </li>
                        <li>
                            <a href="'.base_url().'page/news">
                                <i class="fa fa-calendar"></i> <span>News & Events</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i> <span>Service & Support</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="'.base_url().'page/service"><i class="fa fa-circle-o"></i> Service Center</a></li>
                                <li><a href="'.base_url().'page/support/warranty"><i class="fa fa-circle-o"></i> Warranty</a></li>
                                <li><a href="'.base_url().'page/support/loan"><i class="fa fa-circle-o"></i> Load Programme</a></li>
                                <li><a href="'.base_url().'page/support/tips"><i class="fa fa-circle-o"></i> Tips & Trick</a></li>
                                <li><a href="'.base_url().'page/support/faq"><i class="fa fa-circle-o"></i> FAQ</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="'.base_url().'page/socialmedia">
                                <i class="fa fa-instagram"></i> <span>Social Media</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            ';
            return $ret;
        }
    }
?>