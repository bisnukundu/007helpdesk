<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkuser {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next ) {
        if ( session()->has( 'password' ) && session()->has( 'user_id' ) ) {
            return $next( $request );
        } else {
            return redirect( '/user_login' );
        }

    }

}
