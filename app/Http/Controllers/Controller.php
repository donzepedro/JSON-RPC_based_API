<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
//Контроллерам не обязательно наследовать базовый класс.
// Но тогда у вас не будет таких удобных возможностей,
// как методы middleware(), validate() и dispatch().

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            echo "<pre>";
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
            echo "</pre>";

        }
    }
}
