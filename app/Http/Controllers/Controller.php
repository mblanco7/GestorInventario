<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** 200 OK */
    protected function return200($object) {
        return response()->json($object, 200);
    }

    /** 201 Created */
    protected function return201($object) {
        return response()->json($object, 201);
    }

    /** 202 Accepted */
    protected function return204($object) {
        return response()->json($object, 204);
    }

    /** 206 Partial Content */
    protected function return206($object) {
        return response()->json($object, 206);
    }

    /** 400 Bad Request */
    protected function return400($object) {
        return response()->json($object, 400);
    }

    /** 401 Unauthorized */
    protected function return401($object) {
        return response()->json($object, 401);
    }

    /** 403 Forbidden */
    protected function return403($object) {
        return response()->json($object, 403);
    }

    /** 404 Not Found */
    protected function return404($object) {
        return response()->json($object, 404);
    }

}
