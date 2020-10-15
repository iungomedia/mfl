<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeamFilter;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    public function index(){
        $client = new \GuzzleHttp\Client();

        $getResults = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX')->getBody();
        $getFilters = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPageFilter')->getBody();

        $filters = json_decode($getFilters, true);
        $teams = collect($filters['teams'])->pluck('teamName', 'idTeam');
        $categories = collect($filters['categories'])->pluck('category', 'idCategory');
        $journeys = collect($filters['journeys'])->pluck('journey', 'idJourney');

        $games = json_decode($getResults);

        $data = [
            'page' => 'resultPage',
            'games' => $games,
            'teams' => $teams,
            'categories' => $categories,
            'journeys' => $journeys,
        ];

        return view('results')->with($data);
    }

    public function useFilters(Request $request)
    {
        $idCategory = $request->idCategory;
        $idTeam = $request->idTeam;
        $idJourney = $request->idJourney;

        $client = new \GuzzleHttp\Client();
        $getGamesFiltered = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam='. $idTeam. '&idCategory=' . $idCategory .'&idJourney=' . $idJourney)->getBody();
        $getFilters = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPageFilter')->getBody();

        $filters = json_decode($getFilters, true);
        $teams = collect($filters['teams'])->pluck('teamName', 'idTeam');
        $categories = collect($filters['categories'])->pluck('category', 'idCategory');
        $journeys = collect($filters['journeys'])->pluck('journey', 'idJourney');
        $gamesFiltered = json_decode($getGamesFiltered);
        

        return view('results_filter', compact('gamesFiltered', 'teams', 'categories', 'journeys'));
    }

}
