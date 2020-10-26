<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
  public function index()
  {
    $games = getRequest("http://sistema.mfl.com.mx/api/v2/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX");

    return view('home')->with([
      'page' => 'homePage',
      'games' => $games->latestScores
    ]);
  }
}
