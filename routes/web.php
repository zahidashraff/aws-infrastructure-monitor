<?php

use Illuminate\Support\Facades\Route;
use App\Services\SystemMetricsService;
use App\Models\ServerMetric;

Route::get('/', function (SystemMetricsService $metricsService) {
    $metrics = $metricsService->getMetrics();

    $metricsService->saveMetrics();

    $recentMetrics = ServerMetric::latest()
    ->take(10)
    ->get();

    $chartMetrics = ServerMetric::latest()
    ->take(10)
    ->get()
    ->reverse()
    ->values();

    $healthChecks = $metricsService->getHealthChecks();

    $lastUpdated = now()->format('d M Y H:i:s');

    $systemInfo = $metricsService->getSystemInfo();

    return view('dashboard', compact(
        'metrics',
        'healthChecks',
        'lastUpdated',
        'systemInfo',
        'recentMetrics',
        'chartMetrics'
    ));
});
