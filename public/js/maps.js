var map;

function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
     map = new google.maps.Map(document.getElementById('map-content'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}

$(document).ready(function () {
    $('.text-center').on('click', function () {
         // event.preventDefault();
        var location = $('#location').val().trim();
        // Testing/Debugging //
        console.log('maps view click');
        $('#map-content').append('<div id="map">');
        // first example //
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
    });
});



