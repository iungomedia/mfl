<?php

namespace App\Http\Controllers;

class TeamController extends Controller
{
  public function index()
  {
    $teams = getRequest('http://sistema.mfl.com.mx/api/v2/TeamsPage');

    return view('teams')->with([
      'page' => 'teamsPage',
      'games' => $teams->latestScores,
      'teams' => $teams->data,
    ]);
  }
}
