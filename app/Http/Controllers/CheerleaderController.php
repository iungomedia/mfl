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
    $games = getRequest('http://sistema.mfl.com.mx/api/v2/TeamsPage');

    $data = [
      'page' => 'cheerleaderPage',
      'games' => $games->latestScores,
      'teams' => $games->data,
    ];

    return view('cheerleader')->with($data);
  }
}
