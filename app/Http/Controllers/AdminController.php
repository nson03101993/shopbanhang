<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\OrdersDetails;
use App\Models\User;
use Carbon\Carbon;


class AdminController extends Controller
{
    //

    public function dashboard(){
        return view('admin.dashboard');
    }

    //Orders

    public function showAllOrders(){
        $all_orders = Orders::paginate(3);
        $orders = Orders::get();
        $count = $all_orders->count();
        $count_all = $orders->count();
        if(isset($all_orders)){
            return view('admin.orders.list_all_orders', compact('all_orders', 'count', 'count_all'));
        }
    }

    public function showOrders($status){
        $all_orders = Orders::where('orders_status',$status)->paginate(3);
        $orders = Orders::where('orders_status',$status)->get();
        $count = $all_orders->count();
        $count_all = $orders->count();
        return view('admin.orders.list_status_orders', compact('all_orders', 'count', 'count_all'));
    }

    public function showDetails($orders_id){
        $date_time = Carbon::now();
        $orders = Orders::find($orders_id);
        return view('admin.orders.details', compact('orders', 'date_time'));
    }

}
