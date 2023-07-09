<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustAdminOrTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // hanya bisa di akses oleh admin dan teacher (role = 1 dan role = 2)
        if ((Auth::user()->role_id) != 1 && (Auth::user()->role_id) != 2) {
            abort(404);
        }

        return $next($request);
    }
}
