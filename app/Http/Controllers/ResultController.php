<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{

  private function get($team_id = null, $category_id = null, $journey_id = null)
  {
    $games = getRequest("http://sistema.mfl.com.mx/api/v2/ResultsPage?idTeam=$team_id&idCategory=$category_id&idJourney=$journey_id");

    return [
      'page' => 'resultPage',
      'games' => $games->data,
      'teams' => collect($games->filters->teams)->pluck('teamName', 'idTeam'),
      'categories' => collect(filterCategories($games->filters->categories))->pluck('category', 'idCategory'),
      'journeys' => collect($games->filters->journeys)->pluck('journey', 'idJourney'),
    ];
  }

  public function index()
  {
    return view('results')->with($this->get());
  }

  public function useFilters(Request $request)
  {
    $team_id = $request->idTeam;
    $category_id = $request->idCategory;
    $journey_id = $request->idJourney;

    return view(
      'results_filter',
      $this->get($team_id, $category_id, $journey_id)
    );
  }
}
