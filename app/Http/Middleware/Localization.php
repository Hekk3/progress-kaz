<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20.01.2020
 * Time: 15:11
 */

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;


class Localization
{
    public function handle($request, Closure $next, $guard = null)
    {
        if(session()->get('lang') == null) session()->put('lang', 'ru');
        app()->setLocale(session()->get('lang'));

        Carbon::setLocale('ru');

        return $next($request);
    }

}
