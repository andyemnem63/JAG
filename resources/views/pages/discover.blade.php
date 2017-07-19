@extends('layouts.dashboard-single')


@section('content')
    <?php
    error_reporting(0);
    set_time_limit(0);


    // https://www.yelp.com/developers/v3/manage_app
    $APP_ID = '8CbYl4nKrSecxSBTNFzvhw';
    $APP_SECRET = 'rg1x7FX7TcOhbt9LyGlUnPXkp1ThnzKzfwwMLl1Jw7o29QtLD4W1pgxNE7pvCXSP';


    //    $download = "";
    //    $download = $_POST['download'];
    //    if ($download != "") {
    //        $darray = unserialize(base64_decode($download));
    //        header('Content-type: application/vnd.ms-excel');
    //        header('Content-disposition: attachment; filename="data.xls"');
    //        foreach ($darray as $value) {
    //            $value = str_replace("|DELIMITER|", "	", $value);
    //            echo $value . "\n";
    //        }
    //        exit();
    //    }
    //    $keywords = "";
    //    $location = "";
    //    $max = "";
    $keywords = trim(strip_tags($_POST['keywords']));
    $location = trim(strip_tags($_POST['location']));
    $max = trim(strip_tags($_POST['max']));

    //    $mile = "10";
    $mile = $_POST['mile'];
    //    if ($mile == "") $mile = "0";
    ?>


    <form id="formSubmit" class="form-wrapper" action="/discovery/{{$trip_id}}" method="post"><input type="hidden"
                                                                                        name="_token"
                                                                                        value="<?php echo csrf_token(); ?>">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="text-center" style="color: white; margin-top: 35vh;">
                    <h1><strong>Discover awesome things to do,<br> food to eat, and places to stay.</strong></h1>
                    <br>
                    {{--<br>--}}
                    {{--<h3>Choose a place to search near:</h3>--}}

                </div>
            </div>
        </div>
    <!--
        <strong>Search Within </strong>
        <input type="radio" id="radio1" name="mile" value="1609" <?php if ($mile == "1609") echo "checked"; ?>>
        <label for="radio1">1 Mile</label>
        <input type="radio" id="radio2" name="mile" value="4828" <?php if ($mile == "4828") echo "checked"; ?>>
        <label for="radio2">3 Miles</label>
        <input type="radio" id="radio3" name="mile" value="8046" <?php if ($mile == "8046") echo "checked"; ?>>
        <label for="radio3">5 Miles</label>
        <input type="radio" id="radio4" name="mile" value="16093" <?php if ($mile == "16093") echo "checked"; ?>>
        <label for="radio4">10 Miles</label>
        <input type="radio" id="radio5" name="mile" value="40000" <?php if ($mile == "40000") echo "checked"; ?>>
        <label for="radio5">25 Miles</label>
        <input type="radio" id="radio6" name="mile" value="0" <?php if ($mile == "0") echo "checked"; ?>>
        <label for="radio6">Max</label>
        -->
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="input-group input-group-lg ">
                    <span class="input-group-addon trvlrs-location"></span>
                    <input type="text" id="location" name="location"
                           <?php if ($location != "") echo 'value="' . $location . '"'; ?> class="form-control discover-input"
                           placeholder="Choose a place to search near"
                           required>
                </div>
                <br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon trvlrs-search"></span>
                    <input type="text" id="search" name="keywords"
                           <?php if ($keywords != "") echo 'value="' . $keywords . '"'; ?> class="form-control discover-input"
                           placeholder="Search for activity, food or accommodation"
                           required>
                </div>
                <br>
            </div>

        <!--
        <select name="max" id="select">
            <optgroup label="Max Results">
                <option value="0" <?php if ($max == "0") echo "selected"; ?>>50</option>
                <option value="50" <?php if ($max == "50") echo "selected"; ?>>100</option>
                <option value="200" <?php if ($max == "200") echo "selected"; ?>>250</option>
                <option value="450" <?php if ($max == "450") echo "selected"; ?>>500</option>
                <option value="950" <?php if ($max == "950") echo "selected"; ?>>1000</option>
            </optgroup>
        </select>
        -->
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-right">
                    <button class="btn btn-lg btn-primary text-center" id="go">Submit</button>
                </div>
            </div>
            {{--<input type="submit" value="go" id="submit">--}}
        </div>
    </form>

@endsection

