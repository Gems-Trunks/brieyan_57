<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class level_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check() && Auth::user()->level === 'admin') {
            // Periksa apakah peran pengguna adalah 'admin'
                return $next($request);
        }
        
        // Jika pengguna bukan admin, alihkan kembali ke halaman dashboard
        // Gunakan `route('dashboard')` jika Anda sudah memberikan nama pada rute dashboard Anda
        return redirect()->route('dashboard');
    }

}