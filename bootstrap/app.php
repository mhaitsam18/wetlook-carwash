<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \app\Http\Middleware\IsAdmin::class,
            'member' => \app\Http\Middleware\IsMember::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->view('errors.index', [
                'title' => 'Halaman tidak ditemukan',
                'message' => 'Maaf, halaman yang Anda cari tidak dapat ditemukan.',
                'code' => '404',
            ], 404);
        });
        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            return response()->view('errors.index', [
                'title' => 'Akses Ditolak',
                'message' => 'Anda dilarang mengakses halaman ini',
                'code' => '403',
            ], 403);
        });
        $exceptions->render(function (UnauthorizedHttpException $e, Request $request) {
            return response()->view('errors.index', [
                'title' => 'Tidak Memiliki Wewenang',
                'message' => 'Anda tidak memiliki wewenang untuk mengakses halaman ini',
                'code' => '401',
            ], 401);
        });
    })->create();
