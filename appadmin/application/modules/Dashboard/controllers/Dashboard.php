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
		if(!$this->session->userdata("username")){
			redirect("auth/login");
			return;
		}
		$this->load->model("ModelAdmin");
	}

	public function index()
	{
		redirect("dashboard/front");
		return;
	}

	public function front()
	{
		$data["jml_product"] = $this->ModelAdmin->getJmlProduct();
		$data["tittle"] = "Dashboard";
		$this->layout->content("front",$data);
	}

	function deleteslider(){
		$this->db->trans_begin();
		$sql 	= "SELECT image_url FROM ryu_image WHERE image_id = '$_POST[image_id]'";
		$query 	= $this->db->query($sql);
		if($query->num_rows()>0){
			$row = $query->row();
			if (file_exists($row->image_url)) {
				unlink($row->image_url);
			}
			$sqldelete 		= "DELETE FROM ryu_image WHERE image_id = '$_POST[image_id]'";
			$querydelete 	= $this->db->query($sqldelete);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Slider deleted are failed";
		}
		else
		{
			$this->db->trans_commit();
			echo "Slider deleted are success";
		}
	}

	function addslider(){
		if(isset($_FILES["imageslider"]["name"])){
			$validextensions = array("jpeg", "jpg", "png");
			$temporary 		= explode(".", $_FILES["imageslider"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["imageslider"]["type"] == "image/png") || ($_FILES["imageslider"]["type"] == "image/jpg") || ($_FILES["imageslider"]["type"] == "image/jpeg")) && ($_FILES["imageslider"]["size"] < 200000000) && in_array($file_extension, $validextensions)) {
				if ($_FILES["imageslider"]["error"] > 0)
				{
					$message = "Upload Image Error";
				}else
				{
					$url = base_url()."appsources/banner/";
					$image=basename($_FILES['imageslider']['name']);
					$image=str_replace(' ','|',$image);
					$type = explode(".",$image);
					$type = $type[count($type)-1];
					$tmppath="appsources/banner/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
					move_uploaded_file($_FILES['imageslider']['tmp_name'],$tmppath);
					$message = "sukses";
					$image1 = $tmppath;
				}
			}else
			{
				$message = "Size More Than 2MB";
			}
		}
		if($message == "sukses"){
			$response = $this->ModelAdmin->addslider($image1,$_POST["position"],$_POST["imagedesc"]);
			if($response == "sukses"){
				$message = "Slider Success to Add";
			}else{
				$message = "Slider Failed to Add";
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
