<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWS Infrastructure Monitoring Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

    <div class="min-h-screen p-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-slate-800">
                AWS Infrastructure Monitoring Dashboard
            </h1>

            <p class="text-slate-500 mt-2">
                Monitor server health and infrastructure metrics.
            </p>
        </div>

        <!-- Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- CPU -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">CPU Usage</p>

                <h2 class="text-4xl font-bold text-blue-600 mt-2">
                    {{ $metrics['cpu'] }}%
                </h2>

                <p class="text-green-500 text-sm mt-3">
                    Healthy
                </p>
            </div>

            <!-- Memory -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">Memory Usage</p>

                <h2 class="text-4xl font-bold text-purple-600 mt-2">
                    {{ $metrics['memory'] }}%
                </h2>

                <p class="text-green-500 text-sm mt-3">
                    Normal
                </p>
            </div>

            <!-- Disk -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">Disk Usage</p>

                <h2 class="text-4xl font-bold text-orange-600 mt-2">
                    {{ $metrics['disk'] }}%
                </h2>

                <p class="text-green-500 text-sm mt-3">
                    Available
                </p>
            </div>

            <!-- Uptime -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">Server Uptime</p>

                <h2 class="text-4xl font-bold text-emerald-600 mt-2">
                    {{ $metrics['uptime'] }}
                </h2>

                <p class="text-green-500 text-sm mt-3">
                    Online
                </p>
            </div>

        </div>

        <!-- Services Section -->
        <div class="mt-10 bg-white rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-semibold mb-4">
                Service Status
            </h2>

            <div class="space-y-3">

                <div class="flex justify-between">
                    <span>Nginx</span>
                    <span class="text-green-600 font-semibold">Running</span>
                </div>

                <div class="flex justify-between">
                    <span>MySQL</span>
                    <span class="text-green-600 font-semibold">Running</span>
                </div>

                <div class="flex justify-between">
                    <span>Laravel Queue</span>
                    <span class="text-green-600 font-semibold">Running</span>
                </div>

            </div>

        </div>

    </div>

</body>
</html>