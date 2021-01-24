<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

class RefreshCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:refresh-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      echo "Actualizando cache\n";
      Artisan::call('cache:clear');
      $route_collection = Route::getRoutes()->getRoutesByMethod();

      $valid_view = false;


      foreach ($route_collection['GET'] as $value) {
        if($value->uri == "/") {
          $valid_view = true;
        }
        $uri = preg_replace("/^\//", "", $value->uri);
        if($valid_view && $uri !== 'refresh' && !preg_match("/[{}]/", $uri)) {
          $server = request()->getSchemeAndHttpHost();
          echo "para => $server/$uri\n";
          file_get_contents("$server/$uri");
        }
      }
      echo "Listo se ha actualizado correctamente\n";
    }
}
