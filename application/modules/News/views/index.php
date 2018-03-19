<?php
	$month = date("m");
	if($this->session->userdata("month") != ''){
		$month = $this->session->userdata("month");
	}
	$year = date("Y");
	$sql = "SELECT * FROM ryu_event WHERE MONTH(event_created_date) = '$month' AND YEAR(event_created_date) = '$year' order by event_created_date asc";
	$query = $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			if($this->session->userdata('site_lang') == "indonesia"){
				if($row->event_tittle_indo != ''){
					$row->event_tittle = $row->event_tittle_indo;
				}
			}
			$list .= '
				<div class="entry-meta">
					<a href="'.base_url().'news/read/'.$row->event_id.'">
					<img width="80px" src="'.base_url().'appadmin/'.$row->event_image.'" style="display:inline-block;float:left;margin-right:20px"/>
					<p>'.date("l, d M Y H:i", strtotime($row->event_created_date)).'</p>
					<p>('.$row->event_tittle.')</p></a>
				</div>
			';
		}
	}else{
		$list .= '
			<div class="entry-meta">
				<p>No any event</p>
			</div>
		';
	}

	$arrmonth = array(
		"01" => "January",
		"02" => "February",
		"03" => "March",
		"04" => "April",
		"05" => "May",
		"06" => "June",
		"07" => "July",
		"08" => "August",
		"09" => "September",
		"10" => "October",
		"11" => "November",
		"12" => "December",
	);
	$sql 	= "SELECT YEAR(event_created_date) as year FROM `ryu_event` GROUP BY YEAR(event_created_date)";
	$query	= $this->db->query($sql);
	$listtahun = "";
	if($query->num_rows()>0){
		foreach($query->result() as $key){
			$sql = "SELECT MONTH(event_created_date) as month FROM `ryu_event` WHERE YEAR(event_created_date) = '$key->year' GROUP BY MONTH(event_created_date)";
			$query	= $this->db->query($sql);
			$listbulan = "";
			if($query->num_rows()>0){
				foreach($query->result() as $h){
					if($h->month < 10){
						$h->month = "0".$h->month;
					}
					$sql = "SELECT * FROM ryu_event WHERE MONTH(event_created_date) = '$h->month' order by event_created_date asc";
					$query = $this->db->query($sql);
					$listjadwal = "";
					if($query->num_rows()>0){
						foreach($query->result() as $row){
							
							if($this->session->userdata('site_lang') == "indonesia"){
								if($row->event_tittle_indo != ''){
									$row->event_tittle = $row->event_tittle_indo;
								}
							}
							$listjadwal .= '
								<li style="margin-left:20px"><a href="'.base_url().'news/read/'.$row->event_id.'">'.$row->event_tittle.'</a></li>
							';
						}
					}else{
						$listjadwal .= '
							<li style="margin-left:20px">(No Any Event)<li>
						';
					}
					$listbulan .= '
					<li><a href="#'.$arrmonth[$h->month].'" onclick="seemonth(\''.$h->month.'\')">'.$arrmonth[$h->month].'</a>
						<ul id="event_'.$h->month.'">
							'.$listjadwal.'
						</ul>
					</li>';
					$listbulan .= "
						<script>
							$('#event_$h->month').hide();
						</script>
					";
				}
			}
			$listtahun .= '
			<li><a href="#'.$key->year.'" onclick="seeyear(\''.$key->year.'\')">'.$key->year.'</a>
				<ul id="event_'.$key->year.'">
					'.$listbulan.'
				</ul>
			</li>';
			$listtahun .= "
				<script>
					$('#event_$key->year').hide();
				</script>
			";
		}
	}
?>
<!-- counter-area-start -->
<div class="counter-area ptb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="single-counter text-center">
						<h2>News & Event</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- counter-area-end -->
<!-- blog-main-area-start -->
<div class="blog-main-area">
	<div class="container2">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top:50px">
				<!-- blog-main-area-start -->
				<div class="blog-main-area mb-70">
					<!-- single-blog-main-start -->
					<div class="single-blog-main mb-40">
						<div class="postinfo-wrapper">
							<div class="post-info">
								<?=$list?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="background:#e1e1e1;padding-top:50px">
				<!-- left-blog-sidebar-start -->
				<div class="right-blog-sidebar">
					<!-- single-blog-sidebar-start -->
					<div class="single-blog-sidebar mb-30">
						<div class="blog-sidebar-title">
							<h4><span>INDEX</span></h4>
						</div>
						<ul class="blog-menu">
							<?=$listtahun?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- single-blog-sidebar-end -->
<script>
	function seemonth(month){
		$("#event_"+month).toggle();
	}
	function seeyear(month){
		$("#event_"+month).toggle();
	}
</script>