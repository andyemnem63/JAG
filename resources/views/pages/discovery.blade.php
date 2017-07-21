@extends('layouts.dashboard-discovery')

@php
    // initialize an array to hold marker info for google maps
    $markers =array();
    $count=1;
@endphp

@section('leftcontent')
    <div id="results">

        <!-- Button trigger modal -->
        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".card-modal">Small modal</button>--}}

        @foreach($businesses as $business)

            @php
                // combine all parts of address info together for easy view manipulation
                $address = implode(PHP_EOL, $business->location->display_address);
                // create an array of location information - this is the key to making the map markers work!
                $mapInfo = array($business->name,$business->coordinates->latitude,$business->coordinates->longitude,5);
                // add array just created to the $markers array
                array_push($markers,$mapInfo);
               //$cla = $business->is_closed;
               //$phone = $business->display_phone;
            @endphp

            <div class="col-sm-6">
                <div class="panel panel-default result-card">
                    <a data-toggle="modal" data-target="#Modal{{$count}}" class="card-info">
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

                    <a href="http://maps.google.com/?q={{ $address }}" target="_blank">
                        <div class="panel-body result-card-body">
                            <h4 class="giveMeEllipsis"><i class="fa fa-map-o"></i>&nbsp;&nbsp;{{ $address }} </h4>
                        </div>
                    </a>

                </div>
            </div>

            <!-- Business's Modal -->
            <div class="modal fade" id="Modal{{$count}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header result-card-head" style="background-image: url( {{ $business->image_url }} );">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-activity-title">{{$business->name}}</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{$address}}</p>
                            <a href="{{$business->url}}"><button class="btn btn-sm">Website</button></a>
                            <p>{{$business->rating}}</>
                            <p>{{$business->display_phone}}</p>
                            <p>{{$business->is_closed}}</p>
                            @if ($business->price != null)
                                <p>{{$business->price}}</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $count=$count +1;
            @endphp

        @endforeach
    </div>
@endsection



@section('rightcontent')

    {{--Div to house map--}}
    <div id="map-content" style="position: fixed; top: 0; right: 0;">

    </div>

    {{--JS to generate map based on Yelp Api results--}}
    <script>
        // initialize map variable
        var map;
        // function wrapper
        function initMap() {
            // convert the PHP array into a JS array - this is the key to making this work in Laravel environment!!
            var locations = {!! json_encode($markers) !!};

            var map = new google.maps.Map(document.getElementById('map-content'), {
                zoom: 10,
                center: new google.maps.LatLng({{$lat}}, {{$long}}),
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
