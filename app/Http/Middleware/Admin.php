<?php namespace App\Http\Middleware;

use Closure;


class Admin {

    public function handle($request, Closure $next)
    {
      $user = $request->user();

          if (auth()->user() && $user->rol ==2 ):
              return view('errors.acceso');
          endif;

        return $next($request);
    }

}
