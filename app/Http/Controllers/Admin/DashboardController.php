<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Order;
use App\Models\Card;
use App\Models\CustomerType;
use Auth;
use App\Models\CustomerFeedback;


class DashboardController extends Controller
{

    public function index(){
        // Fetch order totals by date
        $orders = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
                        ->where("status", 2)
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->get();
    
        // Fetch user registrations by date
        $userRegistrations = User::selectRaw('DATE(created_at) as date, COUNT(id) as volume')
                                  ->where('role', 2) // assuming role 2 is for customers
                                  ->groupBy('date')
                                  ->orderBy('date', 'asc')
                                  ->get();
    
        // Extract the dates, amounts, and user registration volumes
        $orderDates = $orders->pluck('date');
        $orderAmounts = $orders->pluck('total');
        $userDates = $userRegistrations->pluck('date');
        $userVolumes = $userRegistrations->pluck('volume');
    
        $data = [
            "totalPriceMM" => Order::where("status", 2)->where("country","myanmar")->sum('total_price'),
            "totalPriceSK" => Order::where("status", 2)->where("country","korea")->sum('total_price'),
            "order" => Order::count(),
            "product" => Product::count(),
            "customer" => User::where("role", "2")->count(),
            "products" => Product::with('category', 'subCategory')->orderBy("id", "desc")->paginate(10),
            "order_datas" => Order::orderBy("id", "desc")->paginate(10),
            "dates" => $orderDates,
            "amounts" => $orderAmounts,
            "userDates" => $userDates,
            "userVolumes" => $userVolumes
        ];
    
        return view("admin.dashboard", $data);
    }
    


    //feedback
    public function feedback(){
        $data = CustomerFeedback::orderBy("id","desc")->get();
        return view("admin.customerfeedback.index", compact('data'));
    }

    //customerDashboardr
    public function customerDashboardr(){
        $user = Auth::user();
        

        // Check if the user has a customerType and type associated
        if ($user->customerType && $user->customerType->type) {
            $name = $user->customerType->type->name;
            $discount = $user->customerType->type->discount_amount;
        } else {
            $discount  = 'No type found'; 
            $name = 'No type found'; // Fallback if no customerType or type is associated
        }
        
        $card_count = Card::where("user_id",$user->id)->count();
        $order_count = Order::where("user_id",$user->id)->count();
        $latest_order  = Order::where("user_id",$user->id)->orderBy("id","desc")->paginate(10);
        $data = [
            "account_role" => $name,
            "account_discount" => $discount . "%",
            "cart_count" => $card_count,
            "order_count" => $order_count,
            "latest_order" => $latest_order
        ];
        return view("customer.dashboard",$data);
    }
}