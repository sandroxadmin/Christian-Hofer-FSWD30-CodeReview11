<div class="row" style="padding-top: 10px">
  <div class="col-6" style="padding-left: 20px;">
    <table class="table text-center">
      <tr>
        <th scope="col">Address</th>
        <th scope="col">Avaible Cars</th>

      </tr>
      <?php foreach ($param['officeArray'] as $office): ?>
        <tr scope="row">
          <td><?php echo $office->streetName.' '.$office->streetNumber; ?></td>
          <td><?php echo $office->availableCars; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <div class="col-6" style="padding-right: 20px; min-height: 250px;">
    <div id="map">
      <script>
          var map;
          var offices = <?php echo $param['officeLocationJson'];?>;
          var officeMarkers = [];
          var officeInfoWindow = [];
          var officePositions = [];
          var geocorder;
          var officeId;

          function initMap() {
            geocoder = new google.maps.Geocoder;
            var position =  {lat: <?php echo $param['centerLat']; ?>, lng:  <?php echo $param['centerLng']; ?>};
            map = new google.maps.Map(document.getElementById('map'), {
              center: position,
              zoom: 12,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              styles: {featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }]}
            });


          for(i = 0; i<offices.length; i++){
            office = offices[i];
            var position = {lat: office.atitude, lng: office.longtitute};
            var  marker = new google.maps.Marker({
              position: position,
              map: map,
              icon: {url: 'public/images/office.png', scaledSize: new google.maps.Size(50, 50)},
              title: 'office'
            });

            marker.addListener('click', function(){
              var contentString = 'Office '+office.fullAddress+'<br> '+office.availableCars+' Cars avaible';
              var officeInfoWindow= new google.maps.InfoWindow({
                content: contentString
              });
              officeInfoWindow.open(map, marker);
            });
            officeMarkers[i] = marker;
          }
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $param['googleMapsKey']; ?>&callback=initMap" async defer></script>
    </div>
  </div>
