@extends('layouts.dashboard-dual')

@php
    // initialize an array to hold marker info for google maps
    $markers =array();
@endphp

@section('leftcontent')
    <div id="results">

        @foreach($businesses as $business)

            @php
                // combine all parts of address info together for easy view manipulation
                $address = implode(PHP_EOL, $business->location->display_address);
                // create an array of location information
                $mapInfo = array($business->name,$business->coordinates->latitude,$business->coordinates->longitude,5);
                // add array just created to the $markers array
                array_push($markers,$mapInfo);
               //$cla = $business->is_closed;
               //$phone = $business->display_phone;
            @endphp

            <div class="col-sm-6">
                <div class="panel panel-default result-card">

                    <a href="{{$business->url}}">
                        <div class="panel-heading result-card-head"
                             style="background-image: url( {{ $business->image_url }} );">
                            <div class="star-rating">
                                <p class="fa">
                                    @if ($business->rating === 5.0)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                    @elseif ($business->rating === 4.5)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star-half-o"></span>
                                    @elseif ($business->rating === 4.0)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 3.5)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star-half-o"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 3.0)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 2.5)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star-half-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 2.0)
                                        <span class="fa-star"></span>
                                        <span class="fa-star"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 1.5)
                                        <span class="fa-star"></span>
                                        <span class="fa-star-half-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 1.0)
                                        <span class="fa-star"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @elseif ($business->rating === 0.5)
                                        <span class="fa-star-half-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @else
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                        <span class="fa-star-o"></span>
                                    @endif
                                </p>
                            </div>

                            <div class="result-card-name">
                                <h4 class="giveMeEllipsis"> {{ $business->name }} </h4>
                            </div>
                        </div>
                    </a>

                    <div class="panel-body result-card-body">
                        <h4 class="giveMeEllipsis"><i class="fa fa-map-o"></i>&nbsp;&nbsp;<?php echo $address?></h4>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection



@section('rightcontent')

    {{--Div to house map--}}
    <div id="map-content"></div>

    {{--JS to generate map based on Yelp Api results--}}
    <script>
        // initialize map variable
        var map;

        function initMap() {
            // convert the PHP array into a javascript array
            var locations = {!! json_encode($markers) !!};

            var map = new google.maps.Map(document.getElementById('map-content'), {
                zoom: 10,
                center: new google.maps.LatLng(28.53, -81.37),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>

@endsection