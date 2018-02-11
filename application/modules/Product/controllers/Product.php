<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

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
		$this->load->model("ModelHome");
	}

	public function index($category=null)
	{
		$category_name 			= $this->ModelHome->getCategoryname($category);
		$data["tittle"] 		= $category_name;
		$data["category_id"]	= $category;
		$data["listproduct"] 	= $this->ModelHome->getProductCategory($category);
		$this->layout->content("index",$data);
	}

	function shop($type=null){
		$category_name 			= $this->ModelHome->getCategoryname($type);
		$data["tittle"] 		= $category_name;
		$data["category_id"]	= $type;
		$data["listproduct"] 	= $this->ModelHome->getProductType($type);
		$this->layout->content("shop",$data);
	}

	function detail($product_id){
		$data["detail"] = $this->ModelHome->getDetailProduct($product_id);
		$data["spek"]	= $this->ModelHome->getDetailProductSpec($product_id);
		$data["tittle"] = "PRODUCT";
		$this->layout->content("detail",$data);
	}
}
