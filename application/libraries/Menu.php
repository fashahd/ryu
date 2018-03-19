<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu {   
        public function treemenu($hasil = null,$parent =0){
            $CI     = &get_instance();
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$parent' and publish = 'y'
                        ORDER BY menu_order asc";
            $query  = $CI->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){                        
                    if($CI->session->userdata('site_lang') == "indonesia"){
                        if($h->menu_title_id != ''){
                            $h->menu_title = $h->menu_title_id;
                        }
                    }
                    $cek_parent=$CI->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->menu_id'");
                    if($cek_parent->num_rows()>0){
                        if($h->url == "" AND $h->editable == "ya"){                            
                            $url = base_url()."product/index/$h->menu_id";
                        }else if($h->url == "" AND $h->editable == "no"){                            
                            $url = "#";
                        }else{
                            $url = base_url().''.$h->url;
                        }
                        $hasil .= '<li class="active"><a href="'.$url.'">'.$h->menu_title.'<i class="fa fa-angle-down"></i></a>
                        <div class="sub-menu"><ul>'.$this->childmenu($h->menu_id).'</ul></div></li>';
                    }
                    else {
                        if($h->url == ""){                            
                            $url = base_url()."product/index/$h->menu_id";
                        }else{
                            $url = base_url().''.$h->url;
                        }
                        $hasil.='<li class="active"><a href="'.$url.'">'.$h->menu_title.'</a></li>';
                    }
                }
				$sql 	= "SELECT * FROM ryu_menu where menu_title = 'Download'";
				$query	= $CI->db->query($sql);
				$filename = "";
				if($query->num_rows()>0){
					$no 	= 1;
					$row 	= $query->row();
					$filename = $row->url;
				}
				$hasil .= '<li><a target="_blank" href="'.base_url().'appadmin/'.$filename.'">Download</a></li>';
                return $hasil;
            }
        }

        function childmenu($menu_id = 0,$hasil=''){
            $CI     = &get_instance();
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$menu_id'
                        ORDER BY menu_order asc";
            $query  = $CI->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){                        
                    if($CI->session->userdata('site_lang') == "indonesia"){
                        if($h->menu_title_id != ''){
                            $h->menu_title = $h->menu_title_id;
                        }
                    }
                    $cek_parent=$CI->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->menu_id'");
                    if($cek_parent->num_rows()>0){
                        if($h->url == ""){
                            $url = base_url()."product/shop/".$h->menu_id;
                        }else{
                            $url = base_url().''.$h->url;
                        }
                        $hasil .= '<li class="active"><a href="'.$url.'">'.$h->menu_title.'<i class="fa fa-angle-right"></i></a>
                        <ul>'.$this->childmenu($h->menu_id).'</ul></li>';
                    }
                    else {
                        if($h->url == ""){
                            $url = base_url()."product/shop/".$h->menu_id;
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