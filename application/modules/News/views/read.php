<?php
	$event_image = "";
	$event_title = "";
	$event_date  = "";
	$event_content = "";
	$sql = "SELECT * FROM ryu_event WHERE event_id = '$event_id'";
	$query = $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		$row = $query->row();
		if($this->session->userdata('site_lang') == "indonesia"){
			if($row->event_content_indo != ''){
				$row->event_content = $row->event_content_indo;
			}
		}
		if($this->session->userdata('site_lang') == "indonesia"){
			if($row->event_tittle_indo != ''){
				$row->event_tittle = $row->event_tittle_indo;
			}
		}
		$event_image = $row->event_image;
		$event_title = $row->event_tittle;
		$event_date  = date("l, d M Y H:i",strtotime($row->event_created_date));
		$event_content = $row->event_content;
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
<!-- counter-area-end -->
<!-- blog-main-area-start -->
<div class="blog-main-area" style="padding-top: 30px">
	<div class="container2">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<!-- blog-main-area-start -->
				<div class="blog-main-area mb-70">
					<!-- single-blog-main-start -->
					<div class="single-blog-main mb-40">
						<div class="post-thumbnail mb-50">
							<a><img src="<?=base_url()?>appadmin/<?=$event_image?>" alt="" /></a>
						</div>
						<div class="postinfo-wrapper">
							<div class="post-info">
								<h1><a><?=$event_title?></a></h1>
								<div class="entry-meta">
									<span>Posted on - <?=$event_date?></span>
								</div>
								<?=$event_content?>
							</div>
						</div>
					</div>
					<!-- single-blog-main-end -->
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