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
        if (str_contains(get_class($object), 'StandardResponse')) {
            $object->status = $status;
            $object->correctToken = true;
            return response()->json($object, $status);
        } else if (str_contains(get_class($object), 'Firebase\Entities')) {
            $robject = new StandardResponse();
            $robject->objeto = $object;
            $robject->status = $status;
            $robject->correctToken = true;
            return response()->json($robject, $status);
        } else if (str_contains(get_class($object), 'Firebase\Iterators')) {
            $robject = new StandardResponse();
            $robject->listado = $object->toArray();
            $robject->status = $status;
            $robject->correctToken = true;
            return response()->json($robject, $status);
        } else {
            if (gettype($object) == 'array') {
                $robject = new StandardResponse();
                $robject->listado = $object;
                $robject->status = $status;
                $robject->correctToken = true;
                return response()->json($robject, $status);
            } else if (gettype($object) == 'object') {
                $robject = new StandardResponse();
                $robject->objeto = $object;
                $robject->status = $status;
                $robject->correctToken = true;
                return response()->json($robject, $status);
            } else {
                $robject = new StandardResponse();
                $robject->data = $object;
                $robject->status = $status;
                $robject->correctToken = true;
                return response()->json($robject, $status);
            }
        }
        return null;
    }

    private function returMessageStatus(string $message, int $status) {
        $object = new StandardResponse();
        $object->mensaje = $message;
        $object->status = $status;
        $object->correctToken = true;
        return response()->json($object, $status);
    }

    /** 200 OK */ protected function return200(mixed $object) { return $this->returnStatus($object, 200); }
    /** 201 Created */ protected function return201(mixed $object) { return $this->returnStatus($object, 201); }
    /** 202 Accepted */ protected function return204(mixed $object) { return $this->returnStatus($object, 204); }
    /** 206 Partial Content */ protected function return206(mixed $object) { return $this->returnStatus($object, 206); }
    /** 400 Bad Request */ protected function return400(mixed $object) { return $this->returnStatus($object, 400); }
    /** 401 Unauthorized */ protected function return401(mixed $object) { return $this->returnStatus($object, 401); }
    /** 403 Forbidden */ protected function return403(mixed $object) { return $this->returnStatus($object, 403); }
    /** 404 Not Found */ protected function return404(mixed $object) { return $this->returnStatus($object, 404); }
    /** 500 Internal Server Error */ protected function return500(mixed $object) { return $this->returnStatus($object, 500); }
    /** 502 Bad Gateway */ protected function return502(mixed $object) { return $this->returnStatus($object, 502); }
    /** 503 Service Unavailable */ protected function return503(mixed $object) { return $this->returnStatus($object, 503); }

    /** 200 Message OK */ protected function returnMessage200(string $object) { return $this->returMessageStatus($object, 200); }
    /** 201 Message Created */ protected function returnMessage201(string $object) { return $this->returMessageStatus($object, 201); }
    /** 202 Message Accepted */ protected function returnMessage204(string $object) { return $this->returMessageStatus($object, 204); }
    /** 206 Message Partial Content */ protected function returnMessage206(string $object) { return $this->returMessageStatus($object, 206); }
    /** 400 Message Bad Request */ protected function returnMessage400(string $object) { return $this->returMessageStatus($object, 400); }
    /** 401 Message Unauthorized */ protected function returnMessage401(string $object) { return $this->returMessageStatus($object, 401); }
    /** 403 Message Forbidden */ protected function returnMessage403(string $object) { return $this->returMessageStatus($object, 403); }
    /** 404 Message Not Found */ protected function returnMessage404(string $object) { return $this->returMessageStatus($object, 404); }
    /** 500 Message Internal Server Error */ protected function returnMessage500(string $object) { return $this->returMessageStatus($object, 500); }
    /** 502 Message Bad Gateway */ protected function returnMessage502(string $object) { return $this->returMessageStatus($object, 502); }
    /** 503 Message Service Unavailable */ protected function returnMessage503(string $object) { return $this->returMessageStatus($object, 503); }

}
