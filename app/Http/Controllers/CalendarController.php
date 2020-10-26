<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CalendarController extends Controller
{

  private function get($team_id = null, $category_id = null, $journey_id = null)
  {
    $dates = getRequest("http://sistema.mfl.com.mx/api/v2/CalendarPage");

    return [
      'page' => 'calendarPage',
      'games' => $dates->latestScores,
      'dates' => $dates->data,
      'teams' => collect($dates->filters->teams)->pluck('teamName', 'idTeam'),
      'categories' => collect(filterCategories($dates->filters->categories))->pluck('category', 'idCategory'),
      'journeys' => collect($dates->filters->journeys)->pluck('journey', 'idJourney'),
      'team_id' => $team_id,
      'category_id'=> $category_id,
      'journey_id' => $journey_id
    ];
  }

  public function index()
  {
    return view('calendar')->with($this->get());
  }

  public function teamFilter($team_id = null)
  {
    return view('calendar', $this->get($team_id));
  }

  public function calendarFilter($calendar_id = null)
  {
    return view('calendar', $this->get(null, $calendar_id));
  }

  public function journeyFilter($journey_id = null)
  {
    return view('calendar', $this->get(null, null, $journey_id));
  }
}
