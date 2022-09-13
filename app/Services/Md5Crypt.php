<?php

namespace App\Services;

class Md5Crypt {

    private static string $salt = '$1$GpUd1gD1$';
    
    public static function crypt(string $toCrypt) : string {
        $result = crypt($toCrypt, Md5Crypt::$salt);
        $result = substr($result, strlen(Md5Crypt::$salt));
        return $result;
    }

}