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
?>
<!-- breadcrumb-area-start -->
<div class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-content text-center">
					<div class="breadcrumb-title text-left">
						<h3><a href="#"><?=$this->lang->line("need_repairs")?>?</a></h3>
						<p style="font-weight:700;margin-top:10px"><?=$this->lang->line("repair_ket")?>.</p>
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
						<h2><?=$this->lang->line("find_service")?> :</h2>
					</div>			
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="search-area">
								<input type="text" placeholder="City" value="<?=$city?>"/>
						</div>
					</div>				
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="search-area">
								<input type="text" placeholder="Province" value="<?=$province?>" />
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
<script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          center: new google.maps.LatLng(-6.167537, 106.826463),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('<?=base_url()?>service/getlokasi', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('name');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('telpon');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
			  infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
			  
              var strong1 = document.createElement('text');
              strong1.textContent = type
              infowincontent.appendChild(strong1);
              infowincontent.appendChild(document.createElement('br'));
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpPTMY70Xnw93pGr6VSJ1rJngApIfPr7E&callback=initMap">
    </script>

<!-- googleapis -->
<!-- <script src="https://maps.googleapis.com/maps/api/js"></script>
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
</script> -->