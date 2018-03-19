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
		if(!$this->session->userdata("username")){
			redirect("auth/login");
			return;
		}
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

	function updateaccount(){
		$username = $this->session->userdata("username");
		if($_POST["new_password"] != '' AND $_POST["password"] != ''){
			if($_POST["new_password"] == $_POST["password"]){
				$password = md5($_POST["new_password"]);
				$sql = "UPDATE ryu_users SET password = '$password' WHERE username = '$username'";
				$this->db->query($sql);
			}else{
				echo "not_match";
				return;
			}
		}
		if($_POST["username"] != ''){
			$sql 	= "UPDATE ryu_users SET username = '$_POST[username]' WHERE username = '$username'";
			$query = $this->db->query($sql);
			if($query){				
				$this->session->set_userdata("username",$_POST["username"]);
			}
		}

		echo "sukses";
		return;
	}

	function updateprofile(){
		$username = $this->session->userdata("username");
		$sql 	= "UPDATE ryu_users SET fullname = '$_POST[fullname]', email ='$_POST[email]' WHERE username = '$username'";
		$query = $this->db->query($sql);
		if($query){
			echo "sukses";
			return;
		}else{
			echo "error";
			return;
		}
	}
}
