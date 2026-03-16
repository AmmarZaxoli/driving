<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfLogged
{
    public function handle(Request $request, Closure $next): Response
    {
        // ئەگەر وەک ئەدمین لۆگین بوو، بیگەڕێنەوە بۆ داشبۆردی ئەدمین
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        // ئەگەر وەک درایڤەر لۆگین بوو، بیگەڕێنەوە بۆ داشبۆردی درایڤەر
        if (Auth::guard('coach')->check()) {
            return redirect()->route('indexdriver');
        }

        return $next($request);
    }
}