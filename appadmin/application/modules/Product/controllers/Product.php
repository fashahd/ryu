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
	public function index($category=null)
	{
		$data["tittle"] = $category;
		$this->layout->content("index",$data);
	}

	function shop($type=null){
		$data["tittle"] = $type;
		$this->layout->content("product",$data);
	}

	function detail($product_id){
		$data["tittle"] = "Powertools";
		$this->layout->content("detail",$data);
	}
}
