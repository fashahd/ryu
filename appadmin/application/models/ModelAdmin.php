<?php
	class ModelAdmin extends CI_Model {

        function getJmlProduct(){
            $sql = "SELECT * FROM ryu_product";
            $query  = $this->db->query($sql);
            return $query->num_rows();
        }

        function getJmlEvent(){
            $sql = "SELECT * FROM ryu_event";
            $query  = $this->db->query($sql);
            return $query->num_rows();
        }

        function getJmlMessage(){
            $sql = "SELECT * FROM ryu_support_ticket";
            $query  = $this->db->query($sql);
            return $query->num_rows();
        }

        function updateproduct($product,$category,$subcategory,$information,$model,$description,$image1,$image2,$image3,$product_id,$product_layout){
            $this->db->trans_begin();
            $data   = array(
                "product_name"  => $product,
                "product_category" => $category,
                "product_note"  => $information,
                "product_subcategory" => $subcategory,
                "product_layout"=>$product_layout
            );

            if($image1 != ""){
                $image1url = array("product_image1"=>$image1);
                $this->db->where("product_id",$product_id);
                $query = $this->db->update("ryu_product",$image1url);
            }

            if($image2 != ""){
                $image2url = array("product_image1"=>$image2);
                $this->db->where("product_id",$product_id);
                $query = $this->db->update("ryu_product",$image2url);
            }

            if($image3 != ""){
                $image3url = array("product_image1"=>$image3);
                $this->db->where("product_id",$product_id);
                $query = $this->db->update("ryu_product",$image3url);
            }
            
            $this->db->where("product_id",$product_id);
            $query = $this->db->update("ryu_product",$data);
            if($query){                
                $sqldelete1 	= "DELETE FROM ryu_product_detail WHERE product_id = '$product_id'";
                $querydelete1 	= $this->db->query($sqldelete1);
                
                if($model != ""){
                    for($i=0;$i<count($model);$i++){
                        $datadetail = array(
                            'product_id' => $product_id,
                            'product_model' => $model[$i],
                            'product_description' => $description[$i]
                        );
                        $this->db->insert('ryu_product_detail', $datadetail);
                    }
                }
            }

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

        function saveproduct($product,$category,$subcategory,$information,$model,$description,$image1,$image2,$image3,$product_layout){
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
                "product_subcategory" => $subcategory,
                "product_layout"=>$product_layout,
                "product_dttm" => date("Y-m-d H:i:s"),
            );
            if($model != ""){
                for($i=0;$i<count($model);$i++){
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

        function addslider($image1,$position,$imagedesc){
            $this->db->trans_begin();
            $data   = array(
                "image_url"     => $image1,
                "image_desc"    => $imagedesc,
                "position"      => $position,
                "created_dttm"  => date("Y-m-d H:i:s"),
            );            
            $query  = $this->db->insert("ryu_image", $data);

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

        function getCategoryname($category){
            $sql    = "SELECT * FROM ryu_menu where menu_id = ?";
            $query  = $this->db->query($sql, array($category));
            $row    = $query->row();
            return $row->menu_title;
        }

        function getOptParentMenu($parent =0,$category=null){
            $list = "";
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$parent' AND editable <> 'no'
                        ORDER BY menu_order asc";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $cek_parent=$this->db->query("SELECT * from ryu_menu WHERE menu_parent_id='$h->menu_id'");
                    if($category == $h->menu_id){
                        $slct = "selected";
                    }else{
                        $slct = "";
                    }
                    $list .= "<option $slct value='$h->menu_id'>$h->menu_title</option>";
                    $list .= $this->childmenu($h->menu_id,$h->menu_title,$category);
                }
            }

            return $list;
        }

        function getOptSubCategory($category = null,$product_subcategory=null){
            $cond = "";
            if($category != ""){
                $cond = "WHERE a.sub_parent_id = '$category'";
            }
            $list = "";
            $sql    = " SELECT a.*,b.menu_title FROM `ryu_subcategory` as a
                        LEFT JOIN ryu_menu as b on b.menu_id = a.sub_parent_id
                        $cond
                        ORDER BY a.sub_order asc";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    if($product_subcategory == $h->sub_id){
                        $slct = "selected";
                    }else{
                        $slct = "";
                    }                
                    $list .= "<option $slct value='$h->sub_id'>$h->sub_name</option>";
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
                        $list .= "<tr><td><input type='checkbox' name='sub_id' id='cat_$h->sub_id' value='$h->sub_id'/></td>
                        <td>$h->menu_title > $h->sub_name</td>
                        <td>$h->sub_order</td>
                        <td><a href='".base_url()."catalog/edit/subcategory/$h->sub_id' class='btn btn-default'><span class='fa fa-edit'></span></a></td>
                        </tr>";
                    // }
                }
            }

            return $list;
        }

        function childmenu($menu_id = 0,$menu_title,$category=""){
            $CI     = &get_instance();
            $list = "";
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$menu_id'
                        ORDER BY menu_order asc";
            $query  = $CI->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $cek_parent=$CI->db->query("SELECT * from ryu_menu as a WHERE a.menu_parent_id='$h->menu_id'");
                    if($category == $h->menu_id){
                        $slct = "selected";
                    }else{
                        $slct = "";
                    }
                    $list .= "<option $slct value='$h->menu_id'>$menu_title > $h->menu_title</option>";
                    $list .= $this->childmenu($h->menu_id,$h->menu_title,$category);
                }
            }
            return $list;
        }

        function getCategories($id = null){
            if($id != ''){
                $sql = "SELECT a.* FROM `ryu_menu` as a
                        WHERE menu_id = '$id'";
            }else{
                $sql = "SELECT a.* FROM `ryu_menu` as a
                        WHERE a.menu_parent_id = 0 and a.editable != 'no'";
            }
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }

        function getSubcategories($id = null){
            if($id != ''){
                $sql = "SELECT a.* FROM `ryu_subcategory` as a
                        WHERE sub_id = '$id'";
            }
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

        function getProductByID($id=null){
            $sql    = " SELECT a.*
                        FROM `ryu_product` as a
                        WHERE product_id = ?";
            $query  = $this->db->query($sql,array($id));
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }

        function getDetailByID($id){
            $sql    = " SELECT a.*
                        FROM `ryu_product_detail` as a
                        WHERE product_id = ?";
            $query  = $this->db->query($sql,array($id));
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }

        function getListProduct($limit, $start = 0){
            $ret = "";
            $sql    = " SELECT a.product_id, a.product_image1, a.product_name, a.product_category , 
                        a.product_subcategory, b.menu_title, c.sub_name, a.product_status
                        FROM `ryu_product` as a
                        LEFT JOIN ryu_menu as b on b.menu_id = a.product_category
                        LEFT JOIN ryu_subcategory as c on c.sub_id = a.product_subcategory
                        ORDER BY a.product_dttm desc
                        LIMIT $start,$limit";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    if($row->sub_name != ""){
                        $subcategory = " > $row->sub_name";
                    }else{
                        $subcategory = "";
                    }
                    $ret .= "<tr>
                    <td><input type='checkbox' id='pro_$row->product_id' name='product_id' value='$row->product_id'/></td>
                    <td><img width='70px' src='".base_url()."$row->product_image1'/></td><td>$row->product_name</td>
                    <td>$row->menu_title $subcategory</td><td>$row->product_status</td>
                    <td><a href='".base_url()."catalog/edit/product/$row->product_id' class='btn btn-default'><span class='fa fa-edit'></span></a></td>
                    </tr>";
                }
            }
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