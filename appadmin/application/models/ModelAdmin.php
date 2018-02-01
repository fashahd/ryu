<?php
	class ModelAdmin extends CI_Model {
        function getOptParentMenu(){
            $sql    = "SELECT * FROM `ryu_menu` WHERE menu_parent_id = 0";
            $query  = $this->db->query($sql);
            $ret    = "";
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $ret .= "<option value='$row->menu_id'>$row->menu_title</option>";
                }
            }
            return $ret;
        }
	}
?>