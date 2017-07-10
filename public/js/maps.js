

    $(document).ready(function () {


        $('.go').on('click', function (event) {
            // event.preventDefault();
            var addressArray = $('#location').val().trim();
            // Testing/Debugging //
            console.log('maps view click');
            $('#map-content').append('<div id="map">');
            console.log('hello');
            // first example //
            var map;
            var latLong = {lat: 28.455022, lng: -81.438414};
            var elevator;
            var myOptions = {
                zoom: 10,
                center: latLong,
                mapTypeId: 'terrain'
            };
            map = new google.maps.Map($('#map')[0], myOptions);

            var marker = new google.maps.Marker({
                position: latLong,
                map: map,
                title: 'Hello World!'
            });
            for (var x = 0; x < addressArray.length; x++) {
                console.log("hey");
                $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addressArray[x]+'&sensor=false', null, function (data) {
                    console.log(data);
                    var p = data.results[0].geometry.location
                    var latlng = new google.maps.LatLng(p.lat, p.lng);
                    new google.maps.Marker({
                        position: latlng,
                        map: map

                    });

                });
            }


        });


    });



