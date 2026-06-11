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

    </div>

</body>
</html>