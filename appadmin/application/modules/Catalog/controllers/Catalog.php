<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("username")){
			redirect("auth/login");
			return;
		}
		$this->load->model("ModelAdmin");
		$this->load->library('pagination');
	}

	public function categories()
	{
		$data["tittle"] = "Categories";
		$data["optparentmenu"] = $this->ModelAdmin->getOptParentMenu();
		$this->layout->content("categories",$data);
	}

	function getOptSubCategory(){
		$category 		= $_POST["category"];
		$optsubcategory = $this->ModelAdmin->getOptSubCategory($category);
		$ret = "
			<div class='form-group'>
				<label>Subcategory</label>
				<select name='subcategory' class='form-control'>
					<option>-- Select Subcategory --</option>
					$optsubcategory
				</select>
			</div>
		";
		echo $ret;
		return;
	}

	public function subcategories()
	{
		$data["tittle"] = "Subcategories";
		$data["subcategory"] = $this->ModelAdmin->getSubCategory();
		$data["optparentmenu"] = $this->ModelAdmin->getOptParentMenu();
		$this->layout->content("subcategories",$data);
	}

	public function products()
	{
		$data["tittle"] = "Products";
		$data["listproduct"] = $this->ModelAdmin->getListProduct();
		$this->layout->content("products",$data);
	}

	function addCategories(){
		$category_name 	= $_POST["category_name"];
		$category_parent 	= $_POST["category_parent"];
		$category_order = $_POST["category_order"];
		$url 	= str_replace(" ","_",$category_name);
		$url 	= strtolower($url);
		if($category_parent == ""){
			$category_parent = 0;
		}

		$sql 	= "INSERT INTO ryu_menu values('','$category_parent','$category_name','$category_order','y','','ya')";

		$query 	= $this->db->query($sql);
		if($query){
			echo "sukses";
			return;
		}else{
			echo "gagal";
			return;
		}
	}

	function addSubcategories(){
		$category_name 	= $_POST["category_name"];
		$category_parent 	= $_POST["category_parent"];
		$category_order = $_POST["category_order"];
		$url 	= str_replace(" ","_",$category_name);
		$url 	= strtolower($url);
		if($category_parent == ""){
			$category_parent = 0;
		}

		$sql 	= "INSERT INTO ryu_subcategory values('','$category_parent','$category_name','$category_order')";

		$query 	= $this->db->query($sql);
		if($query){
			echo "sukses";
			return;
		}else{
			echo "gagal";
			return;
		}
	}

	function addproduct(){
		$data["tittle"] 	= "Add Products";
		$data["product"] 	= $this->ModelAdmin->getListProduct();
		$data["optparentmenu"] = $this->ModelAdmin->getOptParentMenu();
		$this->layout->content("addproducts",$data);
	}

	function edit($type=null,$id=null){
		if($type =="" OR $id == ""){
			$data["tittle"] = "Page Not Found";
			$this->layout->content("404",$data);
			return;
		}
		if($type == "product"){
			$data["tittle"] 	= "Edit Products";
			$data["product"] 	= $this->ModelAdmin->getProductByID($id);
			// $data["optparentmenu"] = $this->ModelAdmin->getOptParentMenu();
			$this->layout->content("editproduct",$data);
		}
	}

	function deleteproduct(){
		$tmppro_id = $_POST["product_id"];

		$arrpro_id = explode("|",$tmppro_id);
		$this->db->trans_begin();
		for($i=0;$i<count($arrpro_id);$i++){
			if($arrpro_id[$i] != ""){
				$sql 	= "SELECT product_image1, product_image2, product_image3 FROM ryu_product WHERE product_id = '{$arrpro_id[$i]}'";
				$query 	= $this->db->query($sql);
				if($query->num_rows()>0){
					$row = $query->row();
					if (file_exists($row->product_image1)) {
						unlink($row->product_image1);
					}
					if (file_exists($row->product_image2)) {
						unlink($row->product_image2);
					}
					if (file_exists($row->product_image3)) {
						unlink($row->product_image3);
					}
					$sqldelete 		= "DELETE FROM ryu_product WHERE product_id = '{$arrpro_id[$i]}'";
					$sqldelete1 		= "DELETE FROM ryu_product_detail WHERE product_id = '{$arrpro_id[$i]}'";
					$querydelete 	= $this->db->query($sqldelete);
					$querydelete1 	= $this->db->query($sqldelete1);
				}
			}
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Product deleted are failed";
		}
		else
		{
			$this->db->trans_commit();
			echo "Product deleted are success";
		}
	}

	function saveproduct(){
		$product 	= $_POST["product"];
		$category 	= $_POST["category"];
		$information 	= $_POST["information"];
		$subcategory = $_POST["subcategory"];
		$model 		 = "";
		$description = "";
		$image1 	 = "";
		$image2 	 = "";
		$image3 	 = "";
		if(isset($_POST["model"])){
			$model 			= $_POST["model"];
		}
		if(isset($_POST["description"])){
			$description 	= $_POST["description"];
		}
		if(isset($_FILES["ImageUpload1"]["name"])){
			$validextensions = array("jpeg", "jpg", "png");
			$temporary 		= explode(".", $_FILES["ImageUpload1"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["ImageUpload1"]["type"] == "image/png") || ($_FILES["ImageUpload1"]["type"] == "image/jpg") || ($_FILES["ImageUpload1"]["type"] == "image/jpeg")) && ($_FILES["ImageUpload1"]["size"] < 200000000) && in_array($file_extension, $validextensions)) {
				if ($_FILES["ImageUpload1"]["error"] > 0)
				{
					$message = "Upload Image 1 Error";
				}else
				{
					$url = base_url()."appsources/products/";
					$image=basename($_FILES['ImageUpload1']['name']);
					$image=str_replace(' ','|',$image);
					$type = explode(".",$image);
					$type = $type[count($type)-1];
					$tmppath="appsources/products/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
					move_uploaded_file($_FILES['ImageUpload1']['tmp_name'],$tmppath);
					$message = "sukses";
					$image1 = $tmppath;
				}
			}else
			{
				$message = "Size More Than 2MB";
			}
		}

		if($_FILES["ImageUpload2"]["name"] != ''){
			$validextensions = array("jpeg", "jpg", "png");
			$temporary 		= explode(".", $_FILES["ImageUpload2"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["ImageUpload2"]["type"] == "image/png") || ($_FILES["ImageUpload2"]["type"] == "image/jpg") || ($_FILES["ImageUpload2"]["type"] == "image/jpeg")) && ($_FILES["ImageUpload2"]["size"] < 200000000) && in_array($file_extension, $validextensions)) {
				if ($_FILES["ImageUpload2"]["error"] > 0)
				{
					$message = "Upload Image 2 Error";
				}else
				{
					$url = base_url()."appsources/products/";
					$image=basename($_FILES['ImageUpload2']['name']);
					$image=str_replace(' ','|',$image);
					$type = explode(".",$image);
					$type = $type[count($type)-1];
					$tmppath="appsources/products/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
					move_uploaded_file($_FILES['ImageUpload2']['tmp_name'],$tmppath);
					$message = "sukses";
					$image2 = $tmppath;
				}
			}else
			{
				$message = "Size Image 2 More Than 2MB";
			}
		}

		if($_FILES["ImageUpload3"]["name"] != ''){
			$validextensions = array("jpeg", "jpg", "png");
			$temporary 		= explode(".", $_FILES["ImageUpload3"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["ImageUpload3"]["type"] == "image/png") || ($_FILES["ImageUpload3"]["type"] == "image/jpg") || ($_FILES["ImageUpload3"]["type"] == "image/jpeg")) && ($_FILES["ImageUpload3"]["size"] < 200000000) && in_array($file_extension, $validextensions)) {
				if ($_FILES["ImageUpload3"]["error"] > 0)
				{
					$message = "Upload Image 3 Error";
				}else
				{
					$url = base_url()."appsources/products/";
					$image=basename($_FILES['ImageUpload3']['name']);
					$image=str_replace(' ','|',$image);
					$type = explode(".",$image);
					$type = $type[count($type)-1];
					$tmppath="appsources/products/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
					move_uploaded_file($_FILES['ImageUpload3']['tmp_name'],$tmppath);
					$message = "sukses";
					$image3 = $tmppath;
				}
			}else
			{
				$message = "Size Image 3 More Than 2MB";
			}
		}

		if($message == "sukses"){
			$response = $this->ModelAdmin->saveproduct($product,$category,$subcategory,$information,$model,$description,$image1,$image2,$image3);
			if($response == "sukses"){
				$message = "Product Added";
			}else{
				$message = "Product Failed to Add";
			}
		}else{
			$response = "max_upload";
		}
		
		$data = array(
			"status" 	=> $response,
			"message"	=> $message
		);
		echo json_encode($data);
		return;
	}
}
