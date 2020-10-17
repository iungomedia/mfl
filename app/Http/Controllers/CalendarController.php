<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalendarController extends Controller
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
    $getCalendar = $client
      ->request('GET', 'http://sistema.mfl.com.mx/api/v1/CalendarPage')
      ->getBody();
    $getFilters = $client
      ->request('GET', 'http://sistema.mfl.com.mx/api/v1/CalendarPageFilter')
      ->getBody();

    $filters = json_decode($getFilters, true);
    $teams = collect($filters['teams'])->pluck('teamName', 'idTeam');
    $categories = collect($filters['categories'])->pluck(
      'category',
      'idCategory'
    );
    $journeys = collect($filters['journeys'])->pluck('journey', 'idJourney');
    $dates = json_decode($getCalendar);
    $games = json_decode($getResults);

    $data = [
      'page' => 'calendarPage',
      'games' => $games,
      'dates' => $dates,
      'teams' => $teams,
      'categories' => $categories,
      'journeys' => $journeys,
    ];

    return view('calendar')->with($data);
  }

  public function useFilters(Request $request)
  {
    $idCategory = $request->idCategory;
    $idTeam = $request->idTeam;
    $idJourney = $request->idJourney;

    $client = new \GuzzleHttp\Client();
    $getCalendar = $client
      ->request(
        'GET',
        'http://sistema.mfl.com.mx/api/v1/CalendarPage?idTeam=' .
          $idTeam .
          '&idCategory=' .
          $idCategory .
          '&idJourney=' .
          $idJourney
      )
      ->getBody();
    $getFilters = $client
      ->request('GET', 'http://sistema.mfl.com.mx/api/v1/CalendarPageFilter')
      ->getBody();

    $filters = json_decode($getFilters, true);
    $teams = collect($filters['teams'])->pluck('teamName', 'idTeam');
    $categories = collect($filters['categories'])->pluck(
      'category',
      'idCategory'
    );
    $journeys = collect($filters['journeys'])->pluck('journey', 'idJourney');
    $datesFiltered = json_decode($getCalendar);

    return view(
      'calendar_filter',
      compact('teams', 'categories', 'journeys', 'datesFiltered')
    );
  }
}
