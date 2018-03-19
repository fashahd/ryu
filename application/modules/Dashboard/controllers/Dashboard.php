<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

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

	public function front()
	{
		$data["newproduct"] = $this->ModelHome->getNewProduct();
		$data["tittle"] = "Home";
		$this->layout->content("front",$data);
	}

	function setSearchValue(){
		$keyword = str_replace(" ","%",$_POST["keyword"]);
		echo $keyword;
		return;
	}
}
