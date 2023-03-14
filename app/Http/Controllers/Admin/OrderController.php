<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewOrders(){
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function deleteOrder(Order $order){
        $order->delete();

        return redirect()->to('orders.index')->with(["success" => "order deleted successfuly"]);
    }
}
