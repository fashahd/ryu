<?php
	class ModelHome extends CI_Model {
        function getNewProduct(){
            $sql    = "SELECT a.product_id, a.product_name, a.product_image1, b.menu_title, c.sub_name
            FROM ryu_product as a 
            LEFT JOIN ryu_menu as b on b.menu_id = a.product_category
            LEFT JOIN ryu_subcategory as c on c.sub_id = a.product_subcategory
            ORDER BY a.product_id desc
            Limit 10";
            $query  = $this->db->query($sql);
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }

        function getDetailProduct($product_id=null){
            $sql    = "SELECT a.product_note,a.product_id, a.product_name, a.product_image1, a.product_image2, a.product_image3, b.menu_title, c.sub_name, a.product_layout
                    FROM ryu_product as a 
                    LEFT JOIN ryu_menu as b on b.menu_id = a.product_category
                    LEFT JOIN ryu_subcategory as c on c.sub_id = a.product_subcategory
                    WHERE product_id = ?";
            $query  = $this->db->query($sql,array($product_id));
            if($query->num_rows()>0){
                $row = $query->row();
                $hasil = array($row->product_note,$row->product_id,$row->product_name,$row->product_image1,$row->product_image2,$row->product_image3,$row->menu_title,$row->sub_name,$row->product_layout);
                return $hasil;
            }else{
                return false;
            }
        }

        function getCategoryname($category){
            $sql    = "SELECT * FROM ryu_menu where menu_id = ?";
            $query  = $this->db->query($sql, array($category));
            $row    = $query->row();
            return $row->menu_title;
        }

        function getSubname($sub_id){
            $sql    = "SELECT * FROM ryu_subcategory where sub_id = ?";
            $query  = $this->db->query($sql, array($sub_id));
            $row    = $query->row();
            return $row->sub_name;
        }

        function getProductCategory($category){
            $sql    = " SELECT * FROM `ryu_menu`
                        WHERE menu_parent_id = '$category'
                        ORDER BY menu_order asc";
            $query  = $this->db->query($sql);
            $list = "";
            if($query->num_rows()>0){
                foreach($query->result() as $h){
                    $sql    = "SELECT a.*, b.menu_id,b.menu_title FROM `ryu_product` as a 
                    LEFT JOIN ryu_menu as b on b.menu_id = a.product_category
                    WHERE a.product_category = ?";
                    $query  = $this->db->query($sql,array($h->menu_id));
                    if($query->num_rows()>0){
                        foreach($query->result() as $row){
                            if (strlen($row->product_name) > 30){
                                $product_name = substr($row->product_name, 0, 35) . '...';
                            }else{
                                $product_name = $row->product_name;
                            }
                            $list .= '
                            <div class="single-product" style="margin-left:15px">
                                <div class="product-img">
                                    <a href="'.base_url().'product/detail/'.$row->product_id.'">
                                        <img src="'.base_url().'appadmin/'.$row->product_image1.'"  alt="'.$row->product_name.'" title="'.$row->product_name.'" class="first" />
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3><a href="#">'.$row->menu_title.'</a></h3>
                                    <div class="product-price">
                                        <ul>
                                            <li class="new-price">'.$product_name.'</li>
                                        </ul>
                                    </div>
                                    <a href="'.base_url().'product/detail/'.$row->product_id.'" class="button-new"> View Product</a>
                                </div>
                            </div>
                            ';
                        }
                    }
                    $list .= $this->getProductCategory($h->menu_id); 
                }
                return $list;
            }
        }

        function getProductType($category,$limit, $start = 0){
            $this->db->where("product_category", $category);
            $this->db->limit($limit, $start);
            $query = $this->db->get("ryu_product");
            $list = "";
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    if (strlen($row->product_name) > 30){
                        $product_name = substr($row->product_name, 0, 35) . '...';
                    }else{
                        $product_name = $row->product_name;
                    }
                    $list .= '
                    <div class="col-lg-4">
                        <div class="single-product mb-30">
                            <div class="product-img">
                                <a href="'.base_url().'product/detail/'.$row->product_id.'">
                                    <img src="'.base_url().'appadmin/'.$row->product_image1.'"  alt="'.$row->product_name.'" title="'.$row->product_name.'" class="first" />
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-price">
                                    <ul>
                                        <li class="new-price">'.$product_name.'</li>
                                    </ul>
                                </div>
                                <a href="'.base_url().'product/detail/'.$row->product_id.'" class="button-new"> View Product</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            return $list;
            // $sql    = " SELECT * FROM `ryu_menu`
            //             WHERE menu_id = '$category'
            //             ORDER BY menu_order asc";
            // $query  = $this->db->query($sql);
            // $list = "";
            // if($query->num_rows()>0){
            //     foreach($query->result() as $h){
            //     $list ="";
            //         $sql    = "SELECT a.*, b.menu_id,b.menu_title FROM `ryu_product` as a 
            //         LEFT JOIN ryu_menu as b on b.menu_id = a.product_category
            //         WHERE a.product_category = ? LIMIT $limit, $start";
            //         echo $sql;
            //         $query  = $this->db->query($sql,array($category));
            //         if($query->num_rows()>0){
            //             foreach($query->result() as $row){
            //                 $list .= '
            //                 <div class="single-product col-lg-3 mb-30">
            //                     <div class="product-img">
            //                         <a href="'.base_url().'product/detail/'.$row->product_id.'">
            //                             <img src="'.base_url().'appadmin/'.$row->product_image1.'" alt="product" class="first" />
            //                         </a>
            //                     </div>
            //                     <div class="product-content">
            //                         <h3><a href="#">'.$row->menu_title.'</a></h3>
            //                         <div class="product-price">
            //                             <ul>
            //                                 <li class="new-price">'.$row->product_name.'</li>
            //                             </ul>
            //                         </div>
            //                         <a href="'.base_url().'product/detail/'.$row->product_id.'" class="button-new"> View Product</a>
            //                     </div>
            //                 </div>
            //                 ';
            //             }
            //         }
            //         // $list .= $this->getProductCategory($h->menu_id); 
            //     // }
            //     return $list;
            // // }
        }

        function getProductTypeSub($sub_id,$limit, $start = 0){
            $list = "";
            $sql    = "SELECT a.*, b.menu_id,b.menu_title FROM `ryu_product` as a 
            LEFT JOIN ryu_menu as b on b.menu_id = a.product_category
            WHERE a.product_subcategory = ?";
            $query  = $this->db->query($sql,array($sub_id));
            $this->db->where("product_subcategory", $sub_id);
            $this->db->limit($limit, $start);
            $query = $this->db->get("ryu_product");
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    if (strlen($row->product_name) > 30){
                        $product_name = substr($row->product_name, 0, 35) . '...';
                    }else{
                        $product_name = $row->product_name;
                    }
                    $list .= '
                    <div class="col-lg-4">
                        <div class="single-product mb-30">
                            <div class="product-img">
                                <a href="'.base_url().'product/detail/'.$row->product_id.'">
                                    <img src="'.base_url().'appadmin/'.$row->product_image1.'" alt="'.$row->product_name.'" title="'.$row->product_name.'" class="first" />
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="#"></a></h3>
                                <div class="product-price">
                                    <ul>
                                        <li class="new-price">'.$product_name.'</li>
                                    </ul>
                                </div>
                                <a href="'.base_url().'product/detail/'.$row->product_id.'" class="button-new"> View Product</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            return $list;
        }

        function getDetailProductSpec($product_id){
            $sql = "SELECT * FROM `ryu_product_detail` WHERE product_id = ?";
            $query  = $this->db->query($sql,array($product_id));
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }
	}
?>