// functions copied and modified from google https://developers.google.com/maps/documentation/javascript/examples/marker-simple?csw=1
// marker function https://developers.google.com/maps/documentation/javascript/symbols
var map, center, marker;
function showMarker(icon) {
  var latitude = Number(document.getElementById('latField').textContent);
  var longitude = Number(document.getElementById('longField').textContent);
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {
      lat: latitude,
      lng: longitude
    }
  });
  console.log(icon);
  if (icon == 1) {
    document.getElementById("colorSelected").disabled = true;
    var marker = new google.maps.Marker({
      map: map,
      position: {
        "lat": latitude,
        "lng": longitude
      }
    });
    console.log(marker);
  }else {
    var fillColor, strokeColor;
    document.getElementById("colorSelected").disabled = false;
    if (document.getElementById("colorSelected").value == "Yellow") {
      fillColor = "#FF0";
      strokeColor = "#ff001d";
    }
    else if (document.getElementById("colorSelected").value == "Blue") {
      fillColor = "#aaff00";
      strokeColor = "#0063d7";
    }
    var marker = new google.maps.Marker({
      position: {
        "lat": latitude,
        "lng": longitude
      },
      map: map,
      icon: {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        fillColor: fillColor,
        fillOpacity: 0.9,
        scale:8,
        strokeColor: strokeColor,
        strokeWeight: 2
      }
    });
  }
}

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {
      lat: 65,
      lng: 25.5
    }
  });
    var latitude = Number(document.getElementById('latField').textContent);
    var longitude = Number(document.getElementById('longField').textContent);
    if (latitude!=null) {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {
      lat: latitude,
      lng: longitude
    }
  });
    var infoWindow = new google.maps.InfoWindow();
    var center = {
      "lat": latitude,
      "lng": longitude
    }
    var text = "Latitude: " + latitude + " and longitude: " + longitude;
    infoWindow.setPosition(center);
    infoWindow.setContent(text);
    infoWindow.open(map);
    map.setCenter(center);
    var icon = document.getElementById("iconselected").value;
    showMarker(icon);
  }
}
