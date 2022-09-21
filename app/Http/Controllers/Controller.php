<?php

namespace App\Http\Controllers;

use App\Models\StandardResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function returnStatus(mixed $object, int $status) {
        if (gettype($object) == 'string') {
            $s_object = new StandardResponse();
            $s_object->data = $status < 400 ? $object : null;
            $s_object->mensaje = $status >= 400 ? $object : null;
            $s_object->status = $status;
            $object = $s_object;
        }
        return response()->json($object, $status);
    }

    /** 200 OK */
    protected function return200($object) {
        return $this->returnStatus($object, 200);
    }

    /** 201 Created */
    protected function return201($object) {
        return $this->returnStatus($object, 201);
    }

    /** 202 Accepted */
    protected function return204($object) {
        return $this->returnStatus($object, 204);
    }

    /** 206 Partial Content */
    protected function return206($object) {
        return $this->returnStatus($object, 206);
    }

    /** 400 Bad Request */
    protected function return400($object) {
        return $this->returnStatus($object, 400);
    }

    /** 401 Unauthorized */
    protected function return401($object) {
        return $this->returnStatus($object, 401);
    }

    /** 403 Forbidden */
    protected function return403($object) {
        return $this->returnStatus($object, 403);
    }

    /** 404 Not Found */
    protected function return404($object) {
        return $this->returnStatus($object, 404);
    }

    /** 500 Internal Server Error */
    protected function return500($object) {
        return $this->returnStatus($object, 500);
    }

    /** 502 Bad Gateway */
    protected function return502($object) {
        return $this->returnStatus($object, 502);
    }

    /** 503 Service Unavailable */
    protected function return503($object) {
        return $this->returnStatus($object, 503);
    }

}
