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

	public function products()
	{
		$data["tittle"] = "Products";
		$data["product"] = $this->ModelAdmin->getProduct();
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

	function addproduct(){
		$data["tittle"] 	= "Add Products";
		$data["product"] 	= $this->ModelAdmin->getProduct();
		$data["optparentmenu"] = $this->ModelAdmin->getOptParentMenu();
		$this->layout->content("addproducts",$data);
	}

	function saveproduct(){
		$product 	= $_POST["product"];
		$category 	= $_POST["category"];
		$information 	= $_POST["information"];
		if(isset($_POST["model"])){
			print_r($_POST["model"]);
		}
		if(isset($_POST["description"])){
			print_r($_POST["description"]);
		}

		echo $product."+".$category."+".$information;
	}
}
