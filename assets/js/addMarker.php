<?php include 'connection.php'; ?>
<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(3.1390, 101.6869);
    var mapOptions = {
      zoom: 17,
      center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // get current location and put house marker
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          map.setCenter(pos);

          const icon = {
            url: "http://maps.google.com/mapfiles/kml/pal2/icon10.png", // url
            scaledSize: new google.maps.Size(35, 35), // scaled size
            origin: new google.maps.Point(0, 0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };

          new google.maps.Marker({
            position: pos,
            map: map,
            icon: icon
          });
        },
        () => {
          document.getElementById("mapError").innerHTML = '<div class="alert alert-danger" role="alert">Geolocation not supported</div>'
        }
      );
    } else {
      document.getElementById("mapError").innerHTML = '<div class="alert alert-danger" role="alert">Geolocation not supported</div>'
    }

    // Add markers from database
    var markers = [
      <?php
      $viewSql = "SELECT * FROM `restaurantTicket` where ticketStatus = 'Running'";
      $result = mysqli_query($db, $viewSql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "{lat:" . $row['restaurantLat'] . ",lng:" . $row['restaurantLong'] . "},"
      ?>
      <?php } ?>
    ];

    for (i = 0; i < markers.length; i++) {
      marker = new google.maps.Marker({
        position: markers[i],
        map: map
      });
    }

  }
</script>