@extends('layouts.dashboard-dual')


@section('leftcontent')

    <?php
    error_reporting(0);
    set_time_limit(0);


    // https://www.yelp.com/developers/v3/manage_app
    $APP_ID = '8CbYl4nKrSecxSBTNFzvhw';
    $APP_SECRET = 'rg1x7FX7TcOhbt9LyGlUnPXkp1ThnzKzfwwMLl1Jw7o29QtLD4W1pgxNE7pvCXSP';


    $download = "";
    $download = $_POST['download'];
    if ($download != "") {
        $darray = unserialize(base64_decode($download));
        header('Content-type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename="data.xls"');
        foreach ($darray as $value) {
            $value = str_replace("|DELIMITER|", "	", $value);
            echo $value . "\n";
        }
        exit();
    }
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
        <table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" class="box"
               style="color: #000000">
            <tr>
                <th width="5%" align="left" class="auto-style7">#</th>
                <th width="10%" align="left" class="auto-style7">Image</th>
                <th width="15%" align="left" class="auto-style7">Business Name</th>
                <th width="35%" align="left" class="auto-style7">Address</th>
                <th width="15%" align="left" class="auto-style7">Phone</th>
                <th width="5%" align="left" class="auto-style7">Categories</th>
                <th width="5%" align="left" class="auto-style7">Reviews</th>
                <th width="5%" align="left" class="auto-style7">Rating</th>
                <th width="5%" align="left" class="auto-style7">Closed</th>
            </tr>
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
            if ($business->image_url != "") $image = "<a href='" . $business->image_url . "' target='_blank'><images border=0 height='100' width='100' src='" . str_replace("o.jpg", "ms.jpg", $business->image_url) . "' /></a>";
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



            $class = ($class == "row2") ? "row1" : "row2";
            ?>


            <tr class="<?php echo $class ?>">
                <td class="parent auto-style7"><?php echo $count ?></td>
                <td class="parent auto-style7"><?php echo $image ?></td>
                <td class="parent auto-style7"><?php echo $title ?></td>
                <td class="parent auto-style7"><?php echo $address ?></td>
                <td class="parent auto-style7"><?php echo $phone ?></td>
                <td class="parent auto-style7"><?php echo $categories ?></td>
                <td class="parent auto-style7"><?php echo $reviews ?></td>
                <td class="parent auto-style7"><?php echo $rating ?></td>
                <td class="parent auto-style7"><?php echo $closed ?></td>
            </tr>

            <?php
            $sarray[] = $name . "|DELIMITER|" . $address . "|DELIMITER|" . str_replace("-", " ", $phone) . "|DELIMITER|" . $reviews . "|DELIMITER|" . $rating . "|DELIMITER|" . $categories . "|DELIMITER|" . $closed . "|DELIMITER|" . $url;
            $count++;
            }
            }
            }
            ?>
            <tr align="center">
                <td colspan="9"><p align="center" class="auto-style5">
                    <?php    echo '<center><form action="/discovery" method="POST"><input name="download" type="hidden" value="' . base64_encode(serialize($sarray)) . '" size="30"><input class="button" type="submit" value="Export Data"></form></center>'; ?>
                </td>
            </tr>
        {{--</table>--}}
        <?php
        }
        }
        ?>
    </div>

    {{--</body>--}}
    {{--</html>--}}

@endsection
<!-- Glen dump all map shit here!! -->

@section('rightcontent')

@endsection

