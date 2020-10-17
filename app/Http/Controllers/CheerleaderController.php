<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactInformation;
use App\Team;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use App\Http\Requests\TeamStoreRequest;

class CheerleaderController extends Controller
{
  public function index()
  {
    $client = new \GuzzleHttp\Client();
    $getResults = $client
      ->request(
        'GET',
        'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX'
      )
      ->getBody();
    $response = $client
      ->request('GET', 'http://sistema.mfl.com.mx/api/v1/TeamsPage')
      ->getBody();

    $teams = json_decode($response);
    $games = json_decode($getResults);

    $data = [
      'page' => 'cheerleaderPage',
      'games' => $games,
      'teams' => $teams,
    ];

    return view('cheerleader')->with($data);
  }
}
