<?php

use Illuminate\Support\Facades\Route;
use App\Services\SystemMetricsService;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function (SystemMetricsService $metricsService) {
    $metrics = $metricsService->getMetrics();
    $healthChecks = $metricsService->getHealthChecks();
    $lastUpdated = now()->format('d M Y H:i:s');
    return view('dashboard', compact(
    'metrics',
    'healthChecks',
    'lastUpdated'
    ));
});
