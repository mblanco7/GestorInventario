<?php

namespace App\Http\Middleware;

use App\Models\StandardResponse;
use App\Services\JWTGenerator;
use Closure;
use Exception;
use Illuminate\Http\Request;

class JWTValidator
{

    private JWTGenerator $jwt;

    public function __construct(JWTGenerator $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Validamos la existencia del barer token con el JWT
        $headers = $request->headers;
        $authorizationHeader = $headers->get('authorization');
        $eJWT = str_replace('Bearer ', '', $authorizationHeader);
        try {
            $jwt = $this->jwt->decode($eJWT);
            $request->attributes->add(['TokenData' => $jwt]);
        } catch (Exception $e) {
            $response = new StandardResponse();
            $response->mensaje = $e->getMessage();
            $response->correctToken = true;
            return response($response, 401);
        }
        $response = $next($request);
        return $response;
    }
}
