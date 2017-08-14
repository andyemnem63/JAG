<?php

error_reporting(0);
set_time_limit(0);

$your_twilio_account_sid = 'AC39edf3845344bdae5356cf0e7137f176';
$your_twilio_auth_token = '470f4bffadbe159fe3c5f498f3b563b2';
$your_twilio_number = '+19542804035';

if($_POST){

    $message =	trim(strip_tags($_POST["message"]));
    $to =	trim(strip_tags($_POST["number"]));


    if($message == "" || $to == ""){

        echo '<p id="error">Please enter message and phone number to send SMS!</p>';

    }else{

        $url = "https://api.twilio.com/2010-04-01/Accounts/$your_twilio_account_sid/SMS/Messages.json";

        $data = array (
            'From' => $your_twilio_number,
            'To' => $to,
            'Body' => $message,

        );
        // Generate URL-encoded query string
        // Initialize curl session which ultimately will transfer data and sanitize environment
        $post = http_build_query($data);
        $x = curl_init($url );
        // set true to perform http post
        curl_setopt($x, CURLOPT_POST, true);
        // return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        // to stop cURL from verifying the peer's certificate
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_USERPWD, "$your_twilio_account_sid:$your_twilio_auth_token");
        // HTTP Authorization method
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // The full data to post in a HTTP "POST" operation passed as an array
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        $json = json_decode($y,true);
        curl_close($x);
        if($json['message'] != "") echo '<div id="msg">'.$json['message'].'</div>';
        else echo '<div id="msg">SMS successfully sent to'.$to.'</div>';
    }
}
?>

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name=“csrf-token” content=“{{ csrf_token() }}“>
    <title>Trvlrs Text</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/app.css')}}">

    <script type="text/javascript">

        $(document).ready(function(){
            $("#formSubmit").submit(function() {
                $.ajax({
                    type: "POST",
                    url: "/twilio",
                    data: $("#formSubmit").serialize(),
                    beforeSend: function(XMLHttpRequest){
                        var overlay = $('<div id="overlay"></div>');
                        overlay.appendTo(document.body);
                        $("#loading").css('display','inline');
                        $('#results').empty();
                    },
                    success: function(data){
                        $("#loading").css('display','none');
                        $('#results').append(data);
                        $("#overlay").remove();
                    }
                });

                return false;
            });

        });

    </script>
</head>

<body>
<h2>Trvlrs Text</h2>

<form id="formSubmit" class="form-wrapper">
    <label><strong>Invite friends to Trvlrs below</strong></label>
    <textarea name="message" id=input style="width: 400px; height: 150px;" required></textarea><br />
    <label><strong>Send SMS to</strong></label><br />
    <input type="text" value="" name="number" id="search" placeholder="+12562844648" >
    <input type="submit" value="Send" action="/twilio" id="submit"><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>
<div style="display:none;" id="loading">
    <p>Please wait sending sms...</p>
</div>

<div id="results"></div>

</body>
</html>
