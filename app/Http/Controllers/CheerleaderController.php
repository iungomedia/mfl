<?php

namespace App\Http\Controllers;

class CheerleaderController extends Controller
{
  public function index()
  {
    $games = getRequest('http://sistema.mfl.com.mx/api/v2/CheerleadersPage');

    return view('cheerleader')->with([
      'page' => 'cheerleaderPage',
      'games' => $games->latestScores,
      'teams' => $games->data,
    ]);
  }
}
