<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $new_order = new Order();
        $new_order->picker = $request->picker;
        $new_order->truck_number = $request->truck_number;
        $new_order->client_name = $request->client_name;

        if ($request->hasFile('file')) {
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $destinationPath = 'images';
            $myimage = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path($destinationPath), $myimage);
            $new_order->file = $destinationPath . '/' . $myimage;
        } else {
            $fileNameToStore = 'noimage.jpg';
            $new_order->file = $fileNameToStore;
        }

        $order_no = Order::orderBy('id', 'DESC')->pluck('id')->first();
        if ($order_no == null or $order_no == "") {
            $order_no = 1;
            $order_no = str_pad($order_no, 6, '0', STR_PAD_LEFT);
            $new_order->order_no = 'U' . $order_no;
        } else {
            $order_no = Order::orderBy('id', 'DESC')->pluck('order_no')->first();
            $order_no = (int)substr($order_no, 1);
            $order_no = $order_no + 1;
            $order_no = str_pad($order_no, 6, '0', STR_PAD_LEFT);
            $new_order->order_no = 'U' . $order_no;
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
        $order = Order::find($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json('deleted');
    }

    // download file
    public function download($id)
    {
        $order = Order::find($id);
        $file = $order->file;
        $file = str_replace('images/', '', $file);
        $path = public_path('images/' . $file);

        // dd($path);
        return response()->download($path);
    }
}
