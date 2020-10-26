<?php

if (!function_exists('buildCategoryForPositionPage')) {
  function buildCategoryForPositionPage($category_id, $group)
  {
    return $category_id . '-' . $group;
  }
}

if (!function_exists('filterCategories')) {
  function filterCategories(array $categories, $by_category_id = false): array
  {
    $data = [];
    $data_count = 0;
    for ($i = 0, $categories_length = count($categories); $i < $categories_length; $i++) {
      $category = &$categories[$i];
      for ($j = 0, $groups_length = count($category->groups); $j < $groups_length; $j++) {
        $group = &$category->groups[$j];
        $new_category = &$data[$data_count];
        $new_category = new stdClass();
        if ($by_category_id) {
          $new_category->idCategory = buildCategoryForPositionPage($category->idCategory, $group);
        } else {
          $new_category->idCategory = strtolower($category->category . $group);
        }
        $new_category->category = $category->category . " " . $group;
        $data_count++;
      }
    }
    return $data;
  }
}


if (!function_exists('getRequest')) {
  /**
   * Este metodo ayuda hacer solicitudes de Tipo GET de forma en que la respuesta persiste
   * @param string $link
   * @param array $custom_config
   * @return stdClass
   */
  function getRequest(string $link, array $custom_config = []): stdClass
  {
    // definiendo configuración por defecto
    $config = array_replace([
      'seconds' => 7200,
      'assoc' => false,
      'depth' => 512,
      'options' => 0
    ], $custom_config);

    // se hace cache de la solicitud
    return Illuminate\Support\Facades\Cache::remember($link, $config['seconds'], function () use ($link, $config) {
      $client = new \GuzzleHttp\Client();
      $get_results = $client->request('GET', $link)->getBody();
      return json_decode($get_results, $config['assoc'], $config['depth'], $config['options']);
    });
  }
}
