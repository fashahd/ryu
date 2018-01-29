<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<div class="breadcrumb-title text-left">
						<h3><a href="#">Grinders</a></h3>
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
											<div class="entry-meta2">
												<p>(Date)</p>
												<p>(News Title / Event Title)</p>
											</div>
											<div class="entry-meta2">
												<p>(Date)</p>
												<p>(News Title / Event Title)</p>
											</div>
											<div class="entry-meta2">
												<p>(Date)</p>
												<p>(News Title / Event Title)</p>
											</div>
											<div class="entry-meta2">
												<p>(Date)</p>
												<p>(News Title / Event Title)</p>
											</div>
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