<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index() {
        $client = new \GuzzleHttp\Client();
        $getResults = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX')->getBody();
        $getFilters = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/PositionsPageFilter')->getBody();

        $filters = json_decode($getFilters, true);
        $categories = collect($filters['categories'])->pluck('category', 'idCategory');
        $journeys = collect($filters['journeys'])->pluck('journey', 'idJourney');


        $getPositions = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/PositionsPage?idCategory='.$categories->keys()[0].'&idJourney=1')->getBody();
        $positions = json_decode($getPositions);
        $games = json_decode($getResults);

        $data = [
            'page' => 'resultPage',
            'games' => $games,
            'positions' => $positions,
            'categories' => $categories,
            'journeys' => $journeys,
            'cDefault' => $categories->keys()[0],
            'jDefault' => '1',
        ];


        return view('position')->with($data);
    }

    public function useFilters(Request $request){
        $idCategory = $request->idCategory;
        $idJourney = $request->idJourney;

        $client = new \GuzzleHttp\Client();
        $getResults = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/ResultsPage?idTeam=XX&idCategory=XX&idJourney=XX')->getBody();
        $getPositions = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/PositionsPage?idCategory='. $idCategory .'&idJourney=' . $idJourney)->getBody();
        $getFilters = $client->request('GET', 'http://sistema.mfl.com.mx/api/v1/PositionsPageFilter')->getBody();

        $filters = json_decode($getFilters, true);
        $categories = collect($filters['categories'])->pluck('category', 'idCategory');
        $journeys = collect($filters['journeys'])->pluck('journey', 'idJourney');
        $positions = json_decode($getPositions);

        $games = json_decode($getResults);

        $data = [
            'page' => 'resultPage',
            'games' => $games,
            'positions' => $positions,
            'categories' => $categories,
            'journeys' => $journeys,
            'cDefault' => $idCategory,
            'jDefault' => $idJourney,
        ];


        return view('position')->with($data);
    }

}
