'use strict';
(function() {

    var location = new google.maps.Geocoder(),
        address = userLocation,
        lat = undefined,
        lng = undefined;
        
    var superObject = {



        googleGeocoder: function (userLocation) {
            location.geocode({'address': address}, function(results, status){
                console.log(results);
                if (status == google.maps.GeocoderStatus.OK) {
                    lat = results[0].geometry.location.lat();
                    lng = results[0].geometry.location.lng();
                    this.weatherAjax(lat, lng);
                    $('#city').html('<strong>' + results[0].formatted_address + "</strong>");
                } else {
                    alert("Geocoding was not successful - STATUS: " + status);
                }
            });
        },

        weatherAjax: function (lat, lng) {
            $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
                APPID: "854b752303d9ba2452c4d15a1960ba95",
                lon: lng, 
                lat: lat,
                units: 'imperial',
                cnt: 6
            }).done(this.weatherCast);
        },

        weatherCast: function (data) {
            this.initMap(data.city.coord.lat, data.city.coord.lon, data.city.name);
        
            for(var i=0; i < data.list.length; i++) {
                var temptatures = '', dayNum = i+1;

                temptatures += '<h3>' + moment.unix(data.list[i].dt).format('ddd, M/D/YYYY') + '</h3>';
                temptatures += '<h2 class="hi_low_temp">' + Math.round(data.list[i].temp.max) + ' <sup>&#8457</sup>  / &nbsp' + Math.round(data.list[i].temp.min) + ' <sup>&#8457</sup> </h2>';
                temptatures += '<img class="img_center" src="http://openweathermap.org/img/w/' + data.list[i].weather[0].icon + '.png" />';
                temptatures += '<p class="hi_low_temp"><strong>' + data.list[i].weather[0].main + '</strong>: ' + data.list[i].weather[0].description + '<br>';
                temptatures += '<strong>Humidity</strong>: &nbsp' + data.list[i].humidity + '% <br>';
                temptatures += '<strong>Winds</strong>: &nbsp' + Math.round(data.list[i].speed) + ' mph towards the ' + this.degToDirection(data.list[i].deg)  + ' </p>';
                $('#day' + dayNum).html(temptatures).addClass('bg-primary');
            }
        },
        
        degToDirection: function (num) {
            var val = Math.floor((num / 22.5) + 0.5);
            var arr = ["N", "NNE", "NE", "ENE", "E", "ESE", "SE", "SSE", "S", "SSW", "SW", "WSW", "W", "WNW", "NW", "NNW"];
            return arr[(val % 16)];
        },
        
        initMap: function (lat, lon, city) {
            var myLatLng = {lat: lat, lng: lon};
            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: myLatLng,
                scrollwheel: false,
                zoom: 13
            });

            var marker = new google.maps.Marker({
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                position: myLatLng,
                title: 'I <3 ' + city,
                icon: '/img/mushroom.png'
            });   
        }
    }



    google.maps.event.addListener(marker, 'dragend', function() {
        var position = marker.getPosition();
        superObject.googleGeocoder(position);
    })



    $('#onlyForm').on('submit', function (e) {
        e.preventDefault();
        var userLocation = $('#userLocation').val();
        console.log(userLocation);
        superObject.googleGeocoder(userLocation);
        var form = document.getElementById("onlyForm");
        form.reset();
    });

    googleGeocoder('San Antonio, TX');
})();