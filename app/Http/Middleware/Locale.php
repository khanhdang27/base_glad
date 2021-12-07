<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->session()->get('locale');
        if($locale === 'cn'){
            $locale = 'zh-CN';
        }
        if($locale === 'tw'){
            $locale = 'zh-TW';
        }
        App::setLocale($locale);
        return $next($request);
    }
}
