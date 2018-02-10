<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {

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
	function index(){
		redirect('/service/page/service');
	}

	public function page($type)
	{
		if($type == "service"){
			$data["tittle"] = "Service Center";
			$this->layout->content("service",$data);
			return;
		}
		if($type == "warranty"){
			$data["tittle"] = "Waranty";
			$this->layout->content("warranty",$data);
			return;
		}
		if($type == "loan"){
			$data["tittle"] = "Loan Programe";
			$this->layout->content("loan",$data);
			return;
		}
		if($type == "tips"){
			$data["tittle"] = "Tips And Trick";
			$this->layout->content("tips",$data);
			return;
		}
		if($type == "faq"){
			$data["tittle"] = "FaQ";
			$this->layout->content("faq",$data);
			return;
		}
		if($type == "contactus"){
			$data["tittle"] = "Contact Us";
			$this->layout->content("contactus",$data);
			return;
		}
	}
}
