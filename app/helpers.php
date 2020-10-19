<?php

if (!function_exists('filterClassCategoriesForCalendar')) {
  /**
   * Ayuda a filtrar los nombres de las categorias
   * dado que en la api se obtienen sin otra clasificación (que yo desconozco), pero es algo asi:
   *
   * Información desde la API de categorias a filtrar:
   *
   * Pewee
   * Midget
   *
   * Clasificaciones de los equipos dentro de la información obtenida de calendario:
   *
   * Pewee 1A
   * Pewee 1B
   * Pewee 1C
   *
   * Midget 1A
   * Midget 1B
   * Midget 1C
   *
   * etc.
   *
   * Dado que el api rige porque filtrara se opta por eliminar estos ultimos elementos.
   *
   * @param string $category
   * @return string
   */
  function filterCategoriesName(string $category): string
  {
    $category = explode(" ", $category);
    if (count($category) > 1) array_pop($category);
    return strtolower(implode("", $category));
  }
}
