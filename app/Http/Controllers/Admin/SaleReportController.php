<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use DB;

class SaleReportController extends Controller
{
    // Index method to show sales report
    public function index()
    {
        // Calculate today's sale volume
        $todaySales = Order::whereDate('created_at', Carbon::today())
            ->where('status', 2)
            ->sum('total_price');

        // Calculate weekly sale volume
        $weeklySales = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('status', 2)
            ->sum('total_price');

        // Calculate monthly sale volume
        $monthlySales = Order::whereMonth('created_at', Carbon::now()->month)
            ->where('status', 2)
            ->sum('total_price');

        // Fetch daily sales grouped by date with count and sum of total price
        $orders = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as sale_count'),
                DB::raw('SUM(total_price) as total_amount')
            )
            ->where('status', 2)
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        return view("admin.sales.index", compact('todaySales', 'weeklySales', 'monthlySales', 'orders'));
    }


    // Detail method to show orders for a specific date
    public function detail($date)
    {
        // Fetch orders for the specific date with status == 2
        $orders = Order::whereDate('created_at', $date)
            ->where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();

        return view("admin.sales.detail", compact('orders', 'date'));
    }

    // Display the details of a specific order
    public function orderDetail($id)
    {
        $order = Order::with('orderDetails.productVaraints', 'user', 'customerType')->findOrFail($id);
        return view('admin.sales.orderDetail', compact('order'));
    }
}