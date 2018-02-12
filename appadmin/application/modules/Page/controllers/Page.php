<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MX_Controller {

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

	public function setting($page_id)
	{
		$data["category_name"] = $this->ModelAdmin->getCategoryname($page_id);
		$data["page_id"] = $page_id;
		$data["tittle"] = "Page";
		$this->layout->content("setting",$data);
	}

	function service(){
		$data["tittle"] = "Service Center";
		$this->layout->content("service",$data);
	}

	function support($type){
		if($type == "warranty"){
			$data["tittle"] = "Warranty";
		}
		if($type == "loan"){
			$data["tittle"] = "Loan Programme";
		}
		if($type == "tips"){
			$data["tittle"] = "Tips & Tricks";
		}
		if($type == "faq"){
			$data["tittle"] = "Frequently Asked Questions";
		}
		$data["support_id"] = $type;
		$this->layout->content("support",$data);
	}

	function update_support(){
		$this->db->trans_begin();
		$support_id = $_POST["support_id"];
		$title 		= $_POST["title"];
		$tagline	= $_POST["tagline"];
		$subtitle 	= $_POST["subtitle"];
		$content 	= $_POST["content"];
		$sql 	= "SELECT * FROM ryu_support where support_id = '$support_id'";
		$query	= $this->db->query($sql);
		if($query->num_rows()>0){
			$data = array(
				"support_title" 	=> $title,
				"support_tagline" 	=> $tagline,
				"support_subtitle" 	=> $subtitle,
				"support_isi" 	=> $content,
			);
			
			$this->db->where("support_id",$support_id);
			$query = $this->db->update("ryu_support",$data);
		}else{
			$data = array(
				"support_id" 		=> $support_id,
				"support_title" 	=> $title,
				"support_tagline" 	=> $tagline,
				"support_subtitle" 	=> $subtitle,
				"support_isi" 		=> $content,
			);
			
			$query = $this->db->insert("ryu_support",$data);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$status = "gagal";
		}
		else
		{
			$this->db->trans_commit();
			$status = "sukses";
		}
		echo json_encode(array(
			"status"=>$status,
			"support_id"=>$support_id)
		);
	}

	function socialmedia(){
		$data["tittle"] = "Social Media";
		$this->layout->content("socialmedia",$data);
	}

	function addsocial(){
		$data = array(
			"facebook"=>$_POST["facebook"],
			"instagram"=>$_POST["instagram"]
		);
		$sql 	= "SELECT * FROM ryu_social";
		$query	= $this->db->query($sql);
		if($query->num_rows()>0){
			$update = $this->db->update("ryu_social",$data);
		}else{			
			$update = $this->db->insert("ryu_social",$data);
		}
		if($update){
			echo "sukses";
			return;
		}else{
			echo "gagal";
			return;
		}
	}

	function addService(){
		$data = array(
			"service_store" => $_POST["store"],
			"service_address" => $_POST["address"],
			"service_phone" => $_POST["phone"],
			"service_city"	=> $_POST["city"],
			"service_province" => $_POST["province"]
		);

		$query  = $this->db->insert("ryu_service", $data);
		if($query){
			echo "sukses";
			return;
		}else{
			echo "gagal";
			return;
		}
	}

	function setDesc(){
		$sql 	= "UPDATE ryu_menu SET menu_desc= '$_POST[desc]' WHERE menu_id = '$_POST[menu_id]'";
		$query 	= $this->db->query($sql);
		if($query){
			$response = "sukses";
		}else{
			$response = "gagal";
		}
		
		if($response == "sukses"){
			$message = "Description Updated";
		}else{
			$message = "Description Failed to Update";
		}

		
		
		$data = array(
			"status" 	=> $response,
			"message"	=> $message,
			"setting"	=> $_POST["menu_id"]
		);
		echo json_encode($data);
		return;
	}

	function setVideo(){
		$sql 	= "UPDATE ryu_menu SET video= '$_POST[video_url]' WHERE menu_id = '$_POST[menu_id]'";
		$query 	= $this->db->query($sql);
		if($query){
			$response = "sukses";
		}else{
			$response = "gagal";
		}
		
		if($response == "sukses"){
			$message = "Video Updated";
		}else{
			$message = "Video Failed to Update";
		}

		
		
		$data = array(
			"status" 	=> $response,
			"message"	=> $message,
			"setting"	=> $_POST["menu_id"]
		);
		echo json_encode($data);
		return;
	}

	function setCover(){
		if(isset($_FILES["image_upload_file"]["name"])){
			$validextensions = array("jpeg", "jpg", "png");
			$temporary 		= explode(".", $_FILES["image_upload_file"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["image_upload_file"]["type"] == "image/png") || ($_FILES["image_upload_file"]["type"] == "image/jpg") || ($_FILES["image_upload_file"]["type"] == "image/jpeg")) && ($_FILES["image_upload_file"]["size"] < 800000000) && in_array($file_extension, $validextensions)) {
				if ($_FILES["image_upload_file"]["error"] > 0)
				{
					$message = "Upload Image 1 Error";
				}else
				{
					$url = base_url()."appsources/banner/";
					$image=basename($_FILES['image_upload_file']['name']);
					$image=str_replace(' ','|',$image);
					$type = explode(".",$image);
					$type = $type[count($type)-1];
					$tmppath="appsources/banner/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
					move_uploaded_file($_FILES['image_upload_file']['tmp_name'],$tmppath);
					$message = "sukses";
					$image1 = $tmppath;
				}
			}else
			{
				$message = "Size More Than 8MB";
			}
		}

		if($message == "sukses"){
			$sql 	= "UPDATE ryu_menu SET image_cover= '$tmppath' WHERE menu_id = '$_POST[menu_id]'";
			$query 	= $this->db->query($sql);
			if($query){
				$response = "sukses";
			}else{
				$response = "gagal";
			}
			if($response == "sukses"){
				$message = "Banner Updated";
			}else{
				$message = "Banner Failed to Update";
			}
		}else{
			$response = "max_upload";
		}
		
		$data = array(
			"status" 	=> $response,
			"message"	=> $message,
			"setting"	=> $_POST["menu_id"]
		);
		echo json_encode($data);
		return;
	}

	function news($page_id=null){
		$data["tittle"] = "News & Events";
		$this->layout->content("news",$data);
	}

	function addEvent(){
		$tanggal 	= $_POST["tanggal"];
		$time 		= $_POST["time"];
		$news 		= $_POST["news"];

		$datadetail = array(
			'event_tittle' => $news,
			'event_date' => $tanggal,
			'event_time' => $time,
		);
		$query 		= $this->db->insert('ryu_event', $datadetail);
		if($query){
			echo "sukses";
			return;
		}else{
			echo "gagal";
			return;
		}
	}

	function deleteservice(){
		$tmppcat_id = $_POST["service_id"];
		$arrcat_id 	= explode("|",$tmppcat_id);
		$this->db->trans_begin();
		for($i=0;$i<count($arrcat_id);$i++){
			$sqldelete 		= "DELETE FROM ryu_service WHERE service_id = '{$arrcat_id[$i]}'";
			$querydelete 	= $this->db->query($sqldelete);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Store deleted are failed";
		}
		else
		{
			$this->db->trans_commit();
			echo "Store deleted are success";
		}
	}

	function deleteevent(){
		$tmppcat_id = $_POST["event_id"];
		$arrcat_id 	= explode("|",$tmppcat_id);
		$this->db->trans_begin();
		for($i=0;$i<count($arrcat_id);$i++){
			$sqldelete 		= "DELETE FROM ryu_event WHERE event_id = '{$arrcat_id[$i]}'";
			$querydelete 	= $this->db->query($sqldelete);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Event deleted are failed";
		}
		else
		{
			$this->db->trans_commit();
			echo "Event deleted are success";
		}
	}
}