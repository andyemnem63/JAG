@extends('layouts.dashboard-dual')

@section('leftcontent')
    <div id="results">
        @foreach($businesses as $business)

            @php
                $cla = $business->is_closed;
                $phone = $business->display_phone;
                $reviews = $business->review_count;
                $address = implode(PHP_EOL, $business->location->display_address);
            @endphp

            <div class="col-sm-6">
                <div class="panel panel-default result-card">

                    <a href="{{$business->url}}">
                        <div class="panel-heading result-card-head"
                             style="background-image: url( {{ $business->image_url }} );">

                            <div class="star-rating fa">
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
    <h2>Map Content</h2>
    <div id="map-content"></div>
@endsection



