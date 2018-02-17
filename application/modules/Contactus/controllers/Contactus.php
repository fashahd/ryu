<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends MX_Controller {

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
		$data["tittle"] = "Contact Us";
		$this->layout->content("contactus",$data);
	}

	function send(){
		$data = array(
			"support_id" => $this->getSupportID(),
			"firstname"	=> $_POST["name_first"],
			"lastname"	=> $_POST["name_last"],
			"email"		=> $_POST["email"],
			"phone"		=> $_POST["phone"],
			"address"	=> $_POST["address"],
			"country"	=> $_POST["country"],
			"city"		=> $_POST["city"],
			"subject"	=> $_POST["subject"],
			"message"	=> $_POST["message"],
			"status"	=> "open",
		);

		$query	= $this->db->insert("ryu_support_ticket",$data);
		if($query){
			$status = "sukses";
			$msg 	= '
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">				
					<div class="entry-header text-center mb-20">
						<i class="zmdi zmdi-check-circle" style="font-size:200px;color:#6dbf50"></i>
						<h4>Thank You for contacting us. We will respond to your request within 24 business hours.
						If you have not heard from us within this time frame, please check your spam, junk mail, or quarantine folder</h4>
					</div>
				</div>
				<div class="col-lg-2">
				</div>				
			';
		}else{
			$status = "gagal";
			$msg 	= '
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">				
					<div class="entry-header text-center mb-20">
						<i class="zmdi zmdi-alert-circle" style="font-size:200px;color:red"></i>
						<h4>Can not connect to server, please try again.</h4>
					</div>
				</div>
				<div class="col-lg-2">
				</div>				
			';
		}
		

		echo json_encode(array("status"=>$status,"response"=>$msg));
		return;
	}

	function getSupportID(){
		$initiatx = "SPT";
		$month   = date("m");
		$day     = date("d");
		$year    = date("y");
		$sql    = "SELECT left(a.support_id,2) as fmonth, mid(a.support_id,3,2) as fday," 
				. " mid(a.support_id,5,2) as fyear, mid(a.support_id,7,3) as initiat,"
				. " right(a.support_id,4) as fno FROM ryu_support_ticket AS a"
				. " where left(a.support_id,2) = '$month' and mid(a.support_id,3,2) = '$day'"
				. " and mid(a.support_id,5,2) = '$year' and mid(a.support_id,7,3)= '$initiatx'"
				. " order by fmonth desc, CAST(fno AS SIGNED) DESC LIMIT 1";
				
		$result = $this->db->query($sql);	
			
		if($result->num_rows($result) > 0) {
			$row = $result->row();
			$initiat = $row->initiat;
			$fyear = $row->fyear;
			$fmonth = $row->fmonth;
			$fday = $row->fday;
			$fno = $row->fno;
			$fno++;
		} else {
			$initiat = $initiatx;
			$fyear   = $year;
			$fmonth  = $month;
			$fday    = $day;
			$fno     = 0;
			$fno++;
		}
		if (strlen($fno)==1){
			$strfno = "000".$fno;
		} else if (strlen($fno)==2){
			$strfno = "00".$fno;
		} else if (strlen($fno)==3){
			$strfno = "0".$fno;
		} else if (strlen($fno)==4){
			$strfno = $fno;
		}
		
		$support_id = $month.$day.$year.$initiat.$strfno;

		return $support_id;
	}
}
