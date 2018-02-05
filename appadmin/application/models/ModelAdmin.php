<?php
	class ModelAdmin extends CI_Model {
        function getOptParentMenu($parent =0){
            $list = "";
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$parent' AND editable <> 'no'
                        ORDER BY menu_order asc";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $cek_parent=$this->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->menu_id'");
                    // if($cek_parent->num_rows()>0){
                    // 	$list .= "<tr><td></td><td>$h->menu_title</td><td>$h->menu_order</td></tr>";
                    // }else{
                        $list .= "<option value='$h->menu_id'>$h->menu_title</option>";
                    // }
                    $list .= $this->childmenu($h->menu_id,$h->menu_title);
                }
            }

            return $list;
        }

        function childmenu($menu_id = 0,$menu_title){
            $CI     = &get_instance();
            $list = "";
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$menu_id'
                        ORDER BY menu_order asc";
            $query  = $CI->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $cek_parent=$CI->db->query("SELECT * from ryu_menu as a WHERE a.menu_parent_id='$h->menu_id'");
                    
                    $list .= "<option value='$h->menu_id'>$menu_title > $h->menu_title</option>";
                    $list .= $this->childmenu($h->menu_id,$h->menu_title);
                }
            }
            return $list;
        }

        function getCategories(){
            $sql = "SELECT a.* FROM `ryu_menu` as a
                    WHERE a.menu_parent_id = 0 and a.editable != 'no'";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }

        function getCategoriesTotal(){
            $sql = "SELECT a.* FROM `ryu_menu` as a
                    WHERE a.editable != 'no'";
            $query  = $this->db->query($sql);
            return $query->num_rows();
        }

        function getProduct(){
            $ret    = "";
            return $ret;
        }
	}
?>