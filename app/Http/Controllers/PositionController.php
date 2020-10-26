<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class PositionController extends Controller
{

  const API_URL = "http://sistema.mfl.com.mx/api/v2/PositionsPage";

  /**
   * Ayuda a calcular los filtros dado que se ocupa incluso para parametros en forma inicial
   *
   * esto puede removerse si el desarrollador del API remueve los filtros obligatorios
   *
   * se tiene que definir los filtros obligatoriamente, si no se definen no muestra nada
   *
   * @return object
   */
  private function computedInitFilters(): stdClass
  {
    return \Illuminate\Support\Facades\Cache::remember('computedInitFilters', 86400, function () {
      $positions = getRequest(self::API_URL);
      $categories = collect(filterCategories($positions->filters->categories, true))->pluck('category', 'idCategory');
      $journeys = collect($positions->filters->journeys)->pluck('journey', 'idJourney');

      $category = $this->parseCategory($categories->keys()[0]);
      $data = new stdClass();
      $data->journey_id = $journeys->keys()[0];

      return (object)array_replace((array)$data, (array)$category);
    });
  }

  private function parseCategory($category)
  {
    $category = explode('-', $category);
    $data = new stdClass();
    $data->category_id = $category[0] ?? '';
    $data->group_id = $category[1] ?? '';
    return $data;
  }

  private function getPageData($category_id = null, $group_id = null, $journey_id = null)
  {
    $config = $this->computedInitFilters();

    $category_id = is_null($category_id) ? $config->category_id : $category_id;
    $group_id = is_null($group_id) ? $config->group_id : $group_id;
    $journey_id = is_null($journey_id) ? $config->journey_id : $journey_id;

    $positions = getRequest(self::API_URL."?idCategory=$category_id&idJourney=$journey_id&group=$group_id");

    return [
      'page' => 'resultPage',
      'games' => $positions->latestScores,
      'positions' => $positions->data,
      'categories' => collect(filterCategories($positions->filters->categories, true))->pluck('category', 'idCategory'),
      'journeys' => collect($positions->filters->journeys)->pluck('journey', 'idJourney'),
      'category' => buildCategoryForPositionPage($category_id, $group_id),
      'journey_id' => $journey_id,
    ];
  }

  public function index()
  {
    return view('position')->with($this->getPageData());
  }

  public function useFilters(Request $request)
  {
    $data = $this->parseCategory($request->idCategory);
    $category_id = $data->category_id;
    $group_id = $data->group_id;
    $journey_id = $request->idJourney;
    return view('position')->with($this->getPageData($category_id, $group_id, $journey_id));
  }
}
