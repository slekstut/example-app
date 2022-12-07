<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all(['picker','truck_number','client_name','file.name']);
        return response()->json($orders);
    }

    public function store(Request $request)
    {

        $new_order = new Order();
        $new_order->picker = $request->picker;
        $new_order->truck_number = $request->truck_number;
        $new_order->client_name = $request->client_name;
        $new_order->file = $request->file;
        $order_no = Order::orderBy('id', 'DESC')->pluck('id')->first();
        if($order_no == null or $order_no == ""){
            $order_no = 1;
        }
        else{
            $new_order->order_no = 'U'.str_pad($new_order->order_no, 6, '0', STR_PAD_LEFT);
            $new_order->$order_no = $order_no + 1;
        }

        $new_order->save();
        return response()->json($new_order);
    }
    
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find
        ($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json('deleted');
    }

}
