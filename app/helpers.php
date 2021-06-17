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

if (!function_exists('parseCheerlanderThumbnail')) {
  function parseCheerlanderThumbnail($source)
  {
    try {
      if (preg_match("/youtube.com/", $source)) {
        $parts = explode("v=", $source);
        $video_id = $parts[1];
        return "https://img.youtube.com/vi/$video_id/hqdefault.jpg";
      }
      return str_replace("http:", "", $source);
    } catch (Exception $error) {
      error_log($error->getMessage());
    }
  }
}

if (!function_exists('isUrlImage')) {
  function isUrlImage($source)
  {
    $source_url = parseCheerlanderThumbnail($source);
    return preg_match("/\.(?:jpg|png|gif|jpeg)/", $source_url);
  }
}

if (!function_exists('printJson')) {
  function printJson($json)
  {
    $type = gettype($json);
    if ($type == "array") {
      echo json_encode($json);
    } else if ($type == "string") {
      echo $json;
    }
  }
}


if (!function_exists('hex2rgba')) {
  function hex2rgba($color, $opacity = 1.0)
  {
    $default = 'rgb(0,0,0)';

    if (empty($color)) {
      return $default;
    }

    if ($color[0] == '#') {
      $color = substr($color, 1);
    }

    if (strlen($color) == 6) {
      $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
      $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
      return $default;
    }

    $rgb = array_map('hexdec', $hex);

    if ($opacity > 1.0) {
      $opacity = 1.0;
    }

    return 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
  }
}


if (!function_exists('filterTeamNameForSearch')) {
  function filterTeamNameForSearch($name)
  {
    return strtolower(str_replace("_" , " ", preg_replace("/([0-9]+)$/", "",trim($name))));
  }
}


if (!function_exists('filterTeamName')) {
  function filterTeamName($name)
  {
    return trim(preg_replace("/\s([0-9]+)/", "", $name));
  }
}


