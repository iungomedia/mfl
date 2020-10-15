<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    public function getContact ($teamId){
        $client = new \GuzzleHttp\Client();
        $getResults = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX')->getBody();
        $response = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/TeamsPageInformation?teamId=' . $teamId )->getBody();

        $contact = json_decode($response);
        $games = json_decode($getResults);


        $data = [
            'page' => 'contactPage',
            'games' => $games,
            'contact' => $contact,
        ];

        return view('contact')->with($data);
    }
}
