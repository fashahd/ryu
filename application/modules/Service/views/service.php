<?php
	$sql 	= "SELECT * FROM ryu_service limit 4";
	$query 	= $this->db->query($sql);
	$listservice = "";
	if($query->num_rows()>0){
		foreach($query->result() as $row){
			$listservice .= '
			<div class="entry-meta2">
				<p>'.$row->service_store.'</p>
				<p style="font-weight:normal">'.$row->service_address.' - '.$row->service_phone.'</p>
			</div>
			';
		}
	}

	function google_maps_search($address, $key = '')
	{
		$url = sprintf('https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=%s', urlencode($address), urlencode($key));
		$response = file_get_contents($url);
		$data = json_decode($response, 'true');
		return $data;
	}

	function map_google_search_result($geo)
	{
		if (empty($geo['status']) || $geo['status'] != 'OK' || empty($geo['results'][0])) {
			return null;
		}
		$data = $geo['results'][0];
		$postalcode = '';
		foreach ($data['address_components'] as $comp) {
			if (!empty($comp['types'][0]) && ($comp['types'][0] == 'postal_code')) {
				$postalcode = $comp['long_name'];
				break;
			}
		}
		$location = $data['geometry']['location'];
		$formatAddress = !empty($data['formated_address']) ? $data['formated_address'] : null;
		$placeId = !empty($data['place_id']) ? $data['place_id'] : null;

		$result = [
			'lat' => $location['lat'],
			'lng' => $location['lng'],
			'postal_code' => $postalcode,
			'formated_address' => $formatAddress,
			'place_id' => $placeId,
		];
		return $result;
	}

	//
	// Usage
	//

	// Your google API key
	// https://developers.google.com/maps/documentation/geocoding/usage-limits?hl=de
	// 2,500 free requests per day, calculated as the sum of client-side and server-side queries.
	// 50 requests per second, calculated as the sum of client-side and server-side queries.
	$googleKey = '';

	$zip = '10117';
	$street = 'Friedrichstrasse 106';
	$city = 'Berlin';
	$country = 'DE';
	$search = implode(', ', [$street, $zip, $city, $country]);

	$geoData = google_maps_search($search, $googleKey);
	if (!$geoData) {
		echo "Error: " . $id . "\n";
		exit;
	}

	$mapData = map_google_search_result($geoData);

	echo $mapData['lat']; // 52.5227797
	echo "\n";
	echo $mapData['lng']; // 13.3880986
?>
<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<div class="breadcrumb-title text-left">
						<h3><a href="#">Need Repairs?</a></h3>
						<p style="font-weight:700;margin-top:10px">Use the form below to search for an authorized RYU service center near you.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="breadcrumb-area-down">
	<div class="container">
		<div class="row">
			<div class="col-lg-12" style="margin-top:30px">
				<div class="breadcrumb-content-down text-center">					
					<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
						<h2>Find a service center :</h2>
					</div>			
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="search-area">
							<form action="#">
								<input type="text" placeholder="City" />
							</form>
						</div>
					</div>				
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="search-area">
							<form action="#">
								<input type="text" placeholder="Province" />
							</form>
						</div>
					</div>				
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="search-area text-left">
							<button class="btn btn-success">Search</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mb-30" style="margin-top:30px">
			<!-- googleMap-area-start -->
			<div class="map-area">
				<div class="">
					<div class="row">
						<div class="col-lg-8">
							<div id="googleMap"></div>
						</div>
						<div class="col-lg-4" style="background:#f0f0f0;padding-top:20px">
							<!-- blog-main-area-start -->
							<div class="blog-main-area mb-70">
								<!-- single-blog-main-start -->
								<div class="single-blog-main mb-40">
									<div class="postinfo-wrapper">
										<div class="post-info">
											<?=$listservice?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- googleMap-end -->
		</div>
	</div>
</div>

<!-- googleapis -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
	var map, geocoder, marker, infowindow;
	/* Google Map js */
	function initialize() {
		var mapOptions = {
		zoom: 15,
		scrollwheel: false,
		center: new google.maps.LatLng(23.810332, 90.412518)
		};

		var map = new google.maps.Map(document.getElementById('googleMap'),
			mapOptions);

		var marker = new google.maps.Marker({
		position: map.getCenter(),
		animation:google.maps.Animation.BOUNCE,
		icon: 'img/map.png',
		map: map
		});

	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>