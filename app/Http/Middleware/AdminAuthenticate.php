<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticate {
    /**
     * @param $request
     * @param Closure $next
     * @return mixed|string
     */
    public function handle($request, Closure $next) {
        if (!auth('admin')->check()) {
            return redirect()->route('admin.get.login');
        }

        return $next($request);
    }
}

