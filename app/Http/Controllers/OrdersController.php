<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all(['date','truck_number','client_name','file']);
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json($order);
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
