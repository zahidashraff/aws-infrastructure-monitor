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
            <p class="text-sm text-slate-400 mt-1">
                Last Updated: {{ $lastUpdated }}
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

                <!-- Progress Bar -->
                <div class="w-full bg-slate-200 rounded-full h-2 mt-4">
                    <div
                        class="bg-blue-500 h-2 rounded-full"
                        style="width: {{ $metrics['cpu'] }}%">
                    </div>
                </div>

                <p class="text-sm mt-3
                    {{ $metrics['cpu'] < 70 ? 'text-green-500' : 'text-red-500' }}">
                    {{ $metrics['cpu'] < 70 ? 'Healthy' : 'High Usage' }}
                </p>
            </div>

            <!-- Memory -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">Memory Usage</p>

                <h2 class="text-4xl font-bold text-purple-600 mt-2">
                    {{ $metrics['memory'] }}%
                </h2>

                <div class="w-full bg-slate-200 rounded-full h-2 mt-4">
                    <div
                        class="bg-purple-500 h-2 rounded-full"
                        style="width: {{ $metrics['memory'] }}%">
                    </div>
                </div>

                <p class="text-sm mt-3
                    {{ $metrics['memory'] < 80 ? 'text-green-500' : 'text-red-500' }}">
                    {{ $metrics['memory'] < 80 ? 'Normal' : 'High Usage' }}
                </p>
            </div>

            <!-- Disk -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">Disk Usage</p>

                <h2 class="text-4xl font-bold text-orange-600 mt-2">
                    {{ $metrics['disk'] }}%
                </h2>

                <div class="w-full bg-slate-200 rounded-full h-2 mt-4">
                    <div
                        class="bg-orange-500 h-2 rounded-full"
                        style="width: {{ $metrics['disk'] }}%">
                    </div>
                </div>

                <p class="text-sm mt-3
                    {{ $metrics['disk'] < 85 ? 'text-green-500' : 'text-red-500' }}">
                    {{ $metrics['disk'] < 85 ? 'Available' : 'Low Storage' }}
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

                @foreach($healthChecks as $check)

                    <div class="flex justify-between py-2 border-b border-slate-100">

                        <span>
                            {{ $check['name'] }}
                        </span>

                        <span class="text-green-600 font-semibold">
                            {{ $check['status'] }}
                        </span>

                    </div>

                @endforeach

            </div>

        </div>

        <!-- System Info Section -->
         <div class="mt-10 bg-white rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-semibold mb-4">
                System Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <span class="font-medium">Hostname:</span>
                    {{ $systemInfo['hostname'] }}
                </div>

                <div>
                    <span class="font-medium">Operating System:</span>
                    {{ $systemInfo['os'] }}
                </div>

                <div>
                    <span class="font-medium">PHP Version:</span>
                    {{ $systemInfo['php_version'] }}
                </div>

                <div>
                    <span class="font-medium">Laravel Version:</span>
                    {{ $systemInfo['laravel_version'] }}
                </div>

                <div>
                    <span class="font-medium">Server Time:</span>
                    {{ $systemInfo['server_time'] }}
                </div>

            </div>

        </div>

        <!-- Metrics Chart Section -->
        <div class="mt-10 bg-white rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-semibold mb-4">
                Performance Trends
            </h2>

            <canvas id="metricsChart"></canvas>

        </div>

        <!-- Metrics History Section -->
        <div class="mt-10 bg-white rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-semibold mb-4">
                Metrics History
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3">CPU</th>
                            <th class="text-left py-3">Memory</th>
                            <th class="text-left py-3">Disk</th>
                            <th class="text-left py-3">Timestamp</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($recentMetrics as $metric)

                        <tr class="border-b">

                            <td class="py-3">
                                {{ $metric->cpu }}%
                            </td>

                            <td class="py-3">
                                {{ $metric->memory }}%
                            </td>

                            <td class="py-3">
                                {{ $metric->disk }}%
                            </td>

                            <td class="py-3">
                                {{ $metric->created_at->format('d M Y H:i:s') }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const labels = @json(
            $chartMetrics->pluck('created_at')
                ->map(fn($date) => $date->format('H:i:s'))
        );

        const cpuData = @json($chartMetrics->pluck('cpu'));
        const memoryData = @json($chartMetrics->pluck('memory'));
        const diskData = @json($chartMetrics->pluck('disk'));

        new Chart(
            document.getElementById('metricsChart'),
            {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'CPU Usage',
                            data: cpuData
                        },
                        {
                            label: 'Memory Usage',
                            data: memoryData
                        },
                        {
                            label: 'Disk Usage',
                            data: diskData
                        }
                    ]
                }
            }
        );

    </script>

</body>
</html>