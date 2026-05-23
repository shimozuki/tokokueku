<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use MoonShine\Laravel\Pages\Page;

use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Column;

use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;

use MoonShine\UI\Components\FlexibleRender;

class Dashboard extends Page
{
    public function getTitle(): string
    {
        return 'Dashboard';
    }

    protected function components(): iterable
    {
        // Ambil data order per bulan
        $pendapatanPerBulan = [];
        for ($i = 1; $i <= 5; $i++) {
            $pendapatanPerBulan[] = (int) Order::whereMonth('created_at', $i)->sum('total_price');
        }

        // Hitung status order
        $orderBaru     = Order::where('order_status', 'baru')->count();
        $orderDiproses = Order::where('order_status', 'diproses')->count();
        $orderSelesai  = Order::where('order_status', 'selesai')->count();
        $orderTotal    = max($orderBaru + $orderDiproses + $orderSelesai, 1); // hindari division by zero

        // Persentase bar status
        $pctBaru     = round(($orderBaru / $orderTotal) * 100);
        $pctDiproses = round(($orderDiproses / $orderTotal) * 100);
        $pctSelesai  = round(($orderSelesai / $orderTotal) * 100);

        return [

            /*
            |--------------------------------------------------------------------------
            | METRICS
            |--------------------------------------------------------------------------
            */

            Grid::make([

                ValueMetric::make('Total Pendapatan')
                    ->value((int) Order::sum('total_price'))
                    ->valueFormat(fn($value) => 'Rp ' . number_format($value, 0, ',', '.'))
                    ->icon('banknotes')
                    ->columnSpan(3),

                ValueMetric::make('Total Order')
                    ->value(Order::count())
                    ->icon('shopping-bag')
                    ->columnSpan(3),

                ValueMetric::make('Total Produk')
                    ->value(Product::count())
                    ->icon('archive-box')
                    ->columnSpan(3),

                ValueMetric::make('Total Pelanggan')
                    ->value(User::where('role', 'pelanggan')->count())
                    ->icon('users')
                    ->columnSpan(3),

            ]),

            /*
            |--------------------------------------------------------------------------
            | CHART & STATUS
            |--------------------------------------------------------------------------
            */

            FlexibleRender::make('
<style>
    .dash-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-top: 24px;
    }
    .dash-card {
        background: #1f2d4d;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.2);
    }
    .dash-card h2 {
        color: #ffffff;
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0 0 24px 0;
    }
    .status-item {
        margin-bottom: 24px;
    }
    .status-item:last-child {
        margin-bottom: 0;
    }
    .status-label {
        display: flex;
        justify-content: space-between;
        color: #ffffff;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }
    .status-bar-bg {
        width: 100%;
        background: #374151;
        border-radius: 9999px;
        height: 14px;
        overflow: hidden;
    }
    .status-bar-fill {
        height: 14px;
        border-radius: 9999px;
    }
    @media (max-width: 768px) {
        .dash-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dash-grid">

    <!-- CHART -->
    <div class="dash-card">
        <h2>📈 Grafik Pendapatan</h2>
        <div id="sales-chart"></div>
    </div>

    <!-- STATUS -->
    <div class="dash-card">
        <h2>📦 Status Order</h2>

        <div class="status-item">
            <div class="status-label">
                <span>Order Baru</span>
                <span>' . $orderBaru . '</span>
            </div>
            <div class="status-bar-bg">
                <div class="status-bar-fill bg-pink-500" style="width: ' . $pctBaru . '%; background:#ec4899;"></div>
            </div>
        </div>

        <div class="status-item">
            <div class="status-label">
                <span>Diproses</span>
                <span>' . $orderDiproses . '</span>
            </div>
            <div class="status-bar-bg">
                <div class="status-bar-fill" style="width: ' . $pctDiproses . '%; background:#3b82f6;"></div>
            </div>
        </div>

        <div class="status-item">
            <div class="status-label">
                <span>Selesai</span>
                <span>' . $orderSelesai . '</span>
            </div>
            <div class="status-bar-bg">
                <div class="status-bar-fill" style="width: ' . $pctSelesai . '%; background:#22c55e;"></div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var options = {
        chart: {
            type: "line",
            height: 300,
            background: "transparent",
            toolbar: { show: false },
            foreColor: "#ffffff"
        },
        series: [{
            name: "Pendapatan",
            data: [' . implode(',', $pendapatanPerBulan) . ']
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "Mei"],
            labels: {
                style: { colors: "#ffffff", fontSize: "13px" }
            },
            axisBorder: { color: "#ffffff44" },
            axisTicks: { color: "#ffffff44" }
        },
        yaxis: {
            labels: {
                style: { colors: "#ffffff", fontSize: "13px" },
                formatter: function(val) {
                    return "Rp " + new Intl.NumberFormat("id-ID").format(val);
                }
            }
        },
        grid: {
            borderColor: "#ffffff22"
        },
        tooltip: {
            theme: "dark",
            y: {
                formatter: function(val) {
                    return "Rp " + new Intl.NumberFormat("id-ID").format(val);
                }
            }
        },
        colors: ["#ec4899"],
        stroke: { curve: "smooth", width: 4 },
        markers: { size: 5, colors: ["#ec4899"], strokeColors: "#ffffff", strokeWidth: 2 },
        legend: {
            labels: { colors: "#ffffff" }
        }
    };

    var chart = new ApexCharts(document.querySelector("#sales-chart"), options);
    chart.render();
});
</script>
'),
        ];
    }
}
