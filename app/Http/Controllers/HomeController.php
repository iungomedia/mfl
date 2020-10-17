<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $client = new \GuzzleHttp\Client();

    $getResults = $client
      ->request(
        'GET',
        'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX'
      )
      ->getBody();

    $games = json_decode($getResults);

    $data = [
      'page' => 'homePage',
      'games' => $games,
    ];

    return view('home')->with($data);
  }
}
