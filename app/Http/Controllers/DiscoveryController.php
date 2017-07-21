<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DiscoveryController extends Controller
{
    public function index ($id) {

        return view('pages.discover')->with(['trip_id' => $id]);

    }

    public function show ($id) {

        return view('pages.discovery')->with(['trip_id' => $id]);

    }
    public function retrieveYelpResults(Request $request, $id) {

        // TODO: Possibly move all of this YELP API logic to a Yelp model.

        $YELP_APP_ID = env( 'YELP_APP_ID');
        $YELP_APP_SECRET = env( 'YELP_APP_SECRET');

        $keywords = trim($request->keywords);
        $location = trim($request->location);

        // TODO: Validate incoming user request data.

        $client = new Client();
        $auth_response = $client->request('POST', 'https://api.yelp.com/oauth2/token', [
            'form_params' => [
                'client_id' => $YELP_APP_ID,
                'client_secret' => $YELP_APP_SECRET,
                'grant_type' => 'client_credentials'
            ],
            'headers' => [
                'Cache-Control' => 'no-cache'
            ]
        ]);

        $auth_body = json_decode($auth_response->getBody());

        $bearer_token = $auth_body->access_token;

        $yelp_url = "https://api.yelp.com/v3/businesses/search?term=" . urlencode($keywords)
                    . "&location=" . urlencode($location)
                    . "&limit=50";

        $yelp_business_request = $client->request('GET', $yelp_url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $bearer_token,
                'Cache-Control' => 'no-cache'
            ]
        ]);

        $business_response = json_decode($yelp_business_request->getBody());
        $long = $business_response->businesses[0]->coordinates->longitude;
        $lat = $business_response->businesses[0]->coordinates->latitude;
        $businesses = $business_response->businesses;

        return view('pages.discovery', compact('businesses'))
            ->with(['trip_id' => $id])
            ->with(['lat' => $lat])
            ->with(['long' => $long]);
    }
}
