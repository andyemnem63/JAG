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
                <div class="panel panel-default .discovery-result-panel">
                    <div class="panel-heading"
                         style="height: 200px;
                                 background-image: url({{ $image }});
                                 background-size: cover;
                                 background-repeat: no-repeat;
                                 border-color: rgba(255,255,255,0.0);">
                    </div>
                    <h3 class="text-center"><?php echo $title ?></h3>
                    <div class="panel-body">
                        <h4><?php echo $address?></h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('rightcontent')
    <div id="map-content">


    <h2>Map Content</h2>


    </div>
@endsection



