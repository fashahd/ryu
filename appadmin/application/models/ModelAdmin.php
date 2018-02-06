<?php
	class ModelAdmin extends CI_Model {

        function saveproduct($product,$category,$information,$model,$description,$image1,$image2,$image3){
            $this->db->trans_begin();
            $product_id = $this->getProductID();
            $data   = array(
                "product_id"    => $product_id,
                "product_name"  => $product,
                "product_category" => $category,
                "product_status" => "actived",
                "product_image1" => $image1,
                "product_image2" => $image2,
                "product_image3" => $image3,
                "product_note"  => $information,
            );
            if($model != ""){
                for($i=1;$i<=count($model);$i++){
                    $datadetail = array(
                        'product_id' => $product_id,
                        'product_model' => $model[$i],
                        'product_description' => $description[$i]
                    );
                    $this->db->insert('ryu_product_detail', $datadetail);
                }
            }
            
            $query  = $this->db->insert("ryu_product", $data);

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                return "gagal";
            }
            else
            {
                $this->db->trans_commit();
                return "sukses";
            }
        }

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

        function getSubCategory(){
            $list = "";
            $sql    = " SELECT a.*,b.menu_title FROM `ryu_subcategory` as a
                        LEFT JOIN ryu_menu as b on b.menu_id = a.sub_parent_id
                        ORDER BY a.sub_order asc";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $cek_parent=$this->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->sub_id'");
                    // if($cek_parent->num_rows()>0){
                    // 	$list .= "<tr><td></td><td>$h->menu_title</td><td>$h->menu_order</td></tr>";
                    // }else{
                        $list .= "<tr><td><input type='checkbox' id='cat_$h->sub_id' value='cat_$h->sub_id'/></td>
                        <td>$h->menu_title > $h->sub_name</td>
                        <td>$h->sub_order</td>
                        <td><button onClick='editSubategories(\"$h->sub_id\")'><span class='fa fa-edit'></span></button></td>
                        </tr>";
                    // }
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

        function getProductID(){
            $initiatx = "RYU";
            $month   = date("m");
            $day     = date("d");
            $year    = date("y");
            $sql    = "SELECT left(a.product_id,2) as fmonth, mid(a.product_id,3,2) as fday," 
                    . " mid(a.product_id,5,2) as fyear, mid(a.product_id,7,3) as initiat,"
                    . " right(a.product_id,4) as fno FROM ryu_product AS a"
                    . " where left(a.product_id,2) = '$month' and mid(a.product_id,3,2) = '$day'"
                    . " and mid(a.product_id,5,2) = '$year' and mid(a.product_id,7,3)= '$initiatx'"
                    . " order by fmonth desc, CAST(fno AS SIGNED) DESC LIMIT 1";
                 
            $result = $this->db->query($sql);	
                
            if($result->num_rows($result) > 0) {
                $row = $result->row();
                $initiat = $row->initiat;
                $fyear = $row->fyear;
                $fmonth = $row->fmonth;
                $fday = $row->fday;
                $fno = $row->fno;
                $fno++;
            } else {
                $initiat = $initiatx;
                $fyear   = $year;
                $fmonth  = $month;
                $fday    = $day;
                $fno     = 0;
                $fno++;
            }
            if (strlen($fno)==1){
                $strfno = "000".$fno;
            } else if (strlen($fno)==2){
                $strfno = "00".$fno;
            } else if (strlen($fno)==3){
                $strfno = "0".$fno;
            } else if (strlen($fno)==4){
                $strfno = $fno;
            }
            
            $product_id = $month.$day.$year.$initiat.$strfno;
    
            return $product_id;
        }
	}
?>