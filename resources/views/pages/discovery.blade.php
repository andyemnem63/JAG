@extends('layouts.dashboard-dual')

@section('leftcontent')

    <?php
    error_reporting(0);
    set_time_limit(0);


    // https://www.yelp.com/developers/v3/manage_app
    $APP_ID = '8CbYl4nKrSecxSBTNFzvhw';
    $APP_SECRET = 'rg1x7FX7TcOhbt9LyGlUnPXkp1ThnzKzfwwMLl1Jw7o29QtLD4W1pgxNE7pvCXSP';

    $keywords = "";
    $location = "";
    $max = "0";
    $keywords = trim(strip_tags($_POST['keywords']));
    $location = trim(strip_tags($_POST['location']));
    $max = trim(strip_tags($_POST['max']));
    $mile = "";
    $mile = $_POST['mile'];
    if ($mile == "") $mile = "0";
    ?>

    <div id="results">
        <?php
        if($_POST){

        if($keywords == ""){
            echo '<p id="error">Please enter any keyword and location!</p>';
        }else{
        $curl = curl_init();
        $postfields = "client_id=" . $APP_ID .
            "&client_secret=" . $APP_SECRET .
            "&grant_type=" . 'client_credentials';

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.yelp.com/oauth2/token',
            CURLOPT_RETURNTRANSFER => true,  // Capture response.
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $body = json_decode($response);
        $bearer_token = $body->access_token;
        ?>
        <div class="row"></div>
        <?php
        $class = "row2";
        $sarray = array();
        $sarray[] = "Business Name|DELIMITER|Address|DELIMITER|Phone|DELIMITER|Reviews|DELIMITER|Rating|DELIMITER|Categories|DELIMITER|Closed|DELIMITER|URL";
        if($keywords != ""){
        $count = 1;
        for($i = 0;$i <= $max;$i = $i + 50){


        if ($mile == "0") {
            $yelp_url = "https://api.yelp.com/v3/businesses/search?term=" . urlencode($keywords) . "&location=" . urlencode($location) . "&limit=50&offset=" . $i;
        } else {
            $yelp_url = "https://api.yelp.com/v3/businesses/search?term=" . urlencode($keywords) . "&location=" . urlencode($location) . "&limit=50&radius=" . $mile . "&offset=" . $i;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $yelp_url,
            CURLOPT_RETURNTRANSFER => true,  // Capture response.
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer " . $bearer_token,
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        foreach($response->businesses as $business){
        $image = $business->image_url;
        $name = $business->name;
        $cla = $business->is_closed;
        $url = $business->url;
        $title = "<a href='" . $url . "' target='_blank'>" . $name . "</a>";
        $phone = $business->display_phone;
        $reviews = $business->review_count;
        $rating = $business->rating;
        $address = $business->location->display_address[0] . " " . $business->location->display_address[1] . " " . $business->location->display_address[2] . " " . $business->location->display_address[3] . " " . $business->location->display_address[4];
        $address = trim($address);
        $address = preg_replace('/\s+/', ' ', $address);
        $categories = "";
        foreach ($business->categories as $cat) {
            $categories .= $cat->title . ", ";
        }
        $categories = rtrim($categories, ", ");
        if ($cla) {
            $closed = "Yes";
        } else {
            $closed = "No";
        }

        ?>
        <div class="col-sm-6">
            <div class="panel panel-default .discovery-result-panel">
                <div class="panel-heading" style="height: 200px; background-image: url(<?php echo $image ?>); background-size: cover; background-repeat: no-repeat; border-color: rgba(255,255,255,0.0);">
                </div>
                <h3><?php echo $title ?></h3>
                <div class="panel-body">
                    <?php echo $address ?>
                </div>
            </div>
        </div>

        <?php
        }
        }
        }
        }
        }
        ?>
    </div>

@endsection



@section('rightcontent')

    <div class="map" id="map-content">

    </div>

@endsection



