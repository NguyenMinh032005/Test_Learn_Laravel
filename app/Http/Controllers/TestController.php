<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller {
    public function hello() {
        $connectionName = DB::getDefaultConnection();
        $config = config("database.connections.$connectionName");

        return response()->json([
            'current_connection' => $connectionName,
            'config' => $config,
        ]);
    }
}
