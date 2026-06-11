<?php

use Illuminate\Support\Facades\Route;
use App\Services\SystemMetricsService;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function (SystemMetricsService $metricsService) {
    $metrics = $metricsService->getMetrics();
    return view('dashboard', compact('metrics'));
});
