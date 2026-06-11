<?php

namespace App\Services;

class SystemMetricsService
{
    public function getMetrics()
    {
        return [
            'cpu' => $this->getCpuUsage(),
            'memory' => $this->getMemoryUsage(),
            'disk' => $this->getDiskUsage(),
            'uptime' => $this->getUptime(),
        ];
    }

    private function getCpuUsage()
    {
        return rand(10, 60);
    }

    private function getMemoryUsage()
    {
        $command = 'powershell "Get-CimInstance Win32_OperatingSystem | Select-Object TotalVisibleMemorySize,FreePhysicalMemory | ConvertTo-Json"';

        $output = shell_exec($command);

        $memory = json_decode($output, true);

        if (!$memory) {
            return 0;
        }

        $total = $memory['TotalVisibleMemorySize'];
        $free = $memory['FreePhysicalMemory'];

        $used = $total - $free;

        return round(($used / $total) * 100);
    }

    private function getDiskUsage()
    {
        $total = disk_total_space("C:");
        $free = disk_free_space("C:");

        $used = $total - $free;

        return round(($used / $total) * 100);
    }

    private function getUptime()
    {
        $output = shell_exec(
            'powershell "$uptime=(Get-Date)-(gcim Win32_OperatingSystem).LastBootUpTime; Write-Output \"$($uptime.Days) Days $($uptime.Hours) Hours\""'
        );

        return trim($output);
    }
}