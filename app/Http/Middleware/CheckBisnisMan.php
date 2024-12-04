<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class CheckBisnisMan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();
        $user = Auth::user();

        if ($user == null) {
            return $next($request);
        }
        
        if (Auth::user()->role == 2 && $perusahaan == null) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return $next($request);
        }

        return $next($request);
    }
}
