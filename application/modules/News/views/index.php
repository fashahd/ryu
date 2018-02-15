<?php
	$month = date("m");
	if($this->session->userdata("month") != ''){
		$month = $this->session->userdata("month");
	}
	$year = date("Y");
	$sql = "SELECT * FROM ryu_event WHERE MONTH(event_date) = '$month' AND YEAR(event_date) = '$year' order by event_date asc";
	$query = $this->db->query($sql);
	$list = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$list .= '
				<div class="entry-meta">
					<p>'.date("l, d M Y", strtotime($row->event_date)).' '.date("H:i", strtotime($row->event_time)).'</p>
					<p>('.$row->event_tittle.')</p>
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
	
	$listbulan = '';
	foreach($arrmonth as $bulan => $ketbulan){
		$sql = "SELECT * FROM ryu_event WHERE MONTH(event_date) = '$bulan' order by event_date asc";
		$query = $this->db->query($sql);
		$listjadwal = "";
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$listjadwal .= '
					<li style="margin-left:20px">('.$row->event_tittle.')</li>
				';
			}
		}else{
			$listjadwal .= '
				<li style="margin-left:20px">(No Any Event)<li>
			';
		}
		$listbulan .= '
		<li><a href="#'.$ketbulan.'" onclick="seemonth(\''.$bulan.'\')">'.$ketbulan.'</a>
			<ul id="event_'.$bulan.'">
				'.$listjadwal.'
			</ul>
		</li>';
		$listbulan .= "
			<script>
				$('#event_$bulan').hide();
			</script>
		";
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
							<?=$listbulan?>
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
</script>