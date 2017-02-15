<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.order.index', compact('orders'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $deleted = $order->delete();
        $message = $deleted ? 'pedido eliminado correctamente.' : 'el pedido no pudo eliminarse.';
        
        return redirect()->route('order.index')->with('message', $message);
    }
}