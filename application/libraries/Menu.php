<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu {   
        public function treemenu($hasil = null,$parent =0){
            $CI     = &get_instance();
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$parent'
                        ORDER BY menu_order asc";
            $query  = $CI->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $child = '
                        <ul>
                            '.$this->treemenu($hasil,$h->menu_id).'
                        </ul>
                    ';
                    $cek_parent=$CI->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->menu_id'");
                    if(($cek_parent->num_rows())>0){
                        if($h->url == ""){
                            $url = "#";
                        }else{
                            $url = base_url().''.$h->url;
                        }
                        $hasil .= '<li class="active"><a href="'.$url.'">'.$h->menu_title.'<i class="fa fa-angle-down"></i></a>
                        <div class="sub-menu"><span style="padding:20px;">'.$child.'</span></div></li>';
                    }
                    else {
                        if($h->url == ""){
                            $url = "#";
                        }else{
                            $url = base_url().''.$h->url;
                        }
                        $hasil.='<li class="active"><a href="'.$url.'">'.$h->menu_title.'</a></li>';
                    }
                }
                return $hasil;
            }
        }
    }
?>