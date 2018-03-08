<div class="row" style="padding-top: 10px;">
  <div class="col-sm-6" style="padding-left: 20px">
    <table class="table text-center">
      <tr>
        <th scope="col">Manufacturer</th>
        <th scope="col">Model</th>
        <th scope="col">Status</th>
      </tr>
      <?php foreach ($param['carArray'] as $car): ?>
        <tr scope="row">
          <td><?php echo $car->carManufacturer; ?></td>
          <td><?php echo $car->carModelName; ?></td>
          <?php if (isset($car->atitude) && isset($car->longtitute)): ?>
            <td class="bg-danger text-white">in use</td>
            <td><button id="button-<?php echo $car->carId; ?>" type="button" class="btn btn-danger btn-sm" onclick=changeCarVisibility(<?php echo $car->carId; ?>)>hide</button></td>
          <?php else: ?>
            <td class="bg-success text-white">free</td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <div class="col-sm-6" style="padding-right: 20px; min-height: 100%">
    <div id="map" class = 'h-50 p-3'>
      <script>
        var map;
        var cars = <?php echo $param['carLocationJson'];?>;
        var carMarkers = [];
        var geocorder;

        function initMap() {
          geocoder = new google.maps.Geocoder;
          var position =  {lat: <?php echo $param['centerLat']; ?>, lng:  <?php echo $param['centerLng']; ?>};
          map = new google.maps.Map(document.getElementById('map'), {
            center: position,
            zoom: 11,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: {featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }]}
          });

          for(i = 0; i<cars.length; i++){
            if(cars[i].atitude != null && cars[i].longtitute != null){
              var atitude = parseFloat(cars[i].atitude);
              var longtitute = parseFloat(cars[i].longtitute);
              carMarkers[cars[i].carId] = new google.maps.Marker({
                position: {lat: atitude, lng: longtitute},
                map: map,
                icon: {url: 'public/images/car.png', scaledSize: new google.maps.Size(50, 50)},
                title: 'Car'
              });
            }
          }
        }

        function changeCarVisibility(id){
          if(document.getElementById('button-'+id).getAttribute('class') == 'btn btn-danger btn-sm'){
            document.getElementById('button-'+id).setAttribute('class', 'btn btn-success btn-sm');
            document.getElementById('button-'+id).innerHTML='show';
            carMarkers[id].setMap(null);
          }else{
            document.getElementById('button-'+id).setAttribute('class', 'btn btn-danger btn-sm');
            document.getElementById('button-'+id).innerHTML='hide';
            carMarkers[id].setMap(map);
          }
        }
        </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $param['googleMapsKey']; ?>&callback=initMap" async defer></script>
    </div>
  </div>
</div>
