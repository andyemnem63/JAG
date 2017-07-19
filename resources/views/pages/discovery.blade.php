@extends('layouts.dashboard-dual')

@section('leftcontent')
    <div id="results">
        @foreach($businesses as $business)
            <?php
                $image = $business->image_url;
                $name = $business->name;
                $cla = $business->is_closed;
                $url = $business->url;
                $title = "<a href='" . $url . "' target='_blank'>" . $name . "</a>";
                $phone = $business->display_phone;
                $reviews = $business->review_count;
                $rating = $business->rating;
                $address_array = $business->location->display_address;
                $address = implode( PHP_EOL, $address_array);
                $categories = "";
            ?>
            <div class="col-sm-6">
                <div class="panel panel-default result-card">
                    {{--<a href="{{$business->url}}" target="_blank">--}}
                    <a data-toggle="modal" data-target="#myModal" class="card-info">
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
        @endforeach
    </div>
@endsection

@section('rightcontent')
    <div id="map-content">

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--<div id="modal-spot" style="position: relative;">--}}

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
                center: new google.maps.LatLng(28.53, -81.37),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


    <h2>Map Content</h2>

    {{--JS to show modal within the right-pane--}}
    <script>


    </div>
@endsection





