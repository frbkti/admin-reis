<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminType
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $adminType
     * @return mixed
     */
    public function handle($request, Closure $next, $adminType)
    {
        // Cek jika user sudah login dan tipe admin cocok dengan tipe yang diakses
        if (Auth::check() && Auth::user()->admin_type === $adminType) {
            return $next($request);
        }

        // Jika tipe admin tidak cocok, redirect ke halaman login atau unauthorized
        return redirect('/admin/login')->withErrors('Unauthorized access to this admin area.');
    }
}
