<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

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
	}

	function signout(){
		$this->session->unset_userdata('username');
		redirect("auth/login");
	}

	public function login()
	{
		$data["tittle"] = "Login";
		$this->load->view("login",$data);
	}

	public function profile()
	{
		$data["tittle"] = "Profile";
		$this->layout->content("profile",$data);
	}

	function validation(){
		$username 	= $_POST["username"];
		$pwd 		= $_POST["password"];
		$password 	= md5($pwd);

		$response 	= $this->ModelUsers->validation($username,$password);
		$data = json_decode($response, true);
		if($data["status"] == "error"){
			echo "error";
			return;
		}

		if($data["status"] == "sukses"){			
			$this->session->set_userdata("username",$data["username"]);
			echo "sukses";
			return;
		}
	}
}
