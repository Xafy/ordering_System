<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function createOrder(Request $request){

        $validateOrder = Validator::make($request->all(), 
            [
                'service_id' => 'required|array',
            ]);

            if($validateOrder->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateOrder->errors()
                ], 401);
            }

        $service_id = $request->service_id;
        $total = Service::whereIn('id', $service_id)->sum('price');
        
        $order = Auth::user()->orders()->create([
            'total' => $total,
        ]);

        $order->services()->sync($service_id);

        return response()->json(["message" => "order created", $order]);
    }

    public function cancelOrder(Order $order){
        $order->status = "canceled";
        $order->save();

        return response()->json("ordered canceld");
    }

    public function getOrders(){
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return response()->json(["My orders" => $orders]);
    }
}
