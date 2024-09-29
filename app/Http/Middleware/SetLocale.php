<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the language from the session or default to 'en'
        $locale = Session::get('locale', 'en');
        App::setLocale($locale);

        // Get the direction from the session or default to 'ltr'
        $direction = Session::get('direction', 'ltr');
        // Set the direction on the body tag
        view()->share('direction', $direction);

        return $next($request);
    }
}
