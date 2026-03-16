<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\PreventBackHistory;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // ١. ناساندنی میدڵوێرەکان بۆ ئەوەی لە ناو routes بەکاریان بهێنیت
        $middleware->alias([
            'is.logged'    => \App\Http\Middleware\CheckIfLogged::class,
            'prevent-back' => \App\Http\Middleware\PreventBackHistory::class,
        ]);

        // ٢. لۆجیکی ڕەوانەکردنەوەی یوزەر ئەگەر لۆگین بێت (بۆ میدڵوێری guest)
        $middleware->redirectUsersTo(function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            }
            if (Auth::guard('coach')->check()) {
                return route('indexdriver');
            }
            return '/';
        });

        // ٣. ئەمە گرنگترین بەشە: جێبەجێکردنی PreventBackHistory لەسەر هەموو پڕۆژەکە
        // بۆ ئەوەی وێبگەڕ لاپەڕەکان پاشەکەوت نەکات و ڕێگری لە Back بکات
        $middleware->append(PreventBackHistory::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
