<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Field;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\Venue;
use Illuminate\Http\Request;

class OwnerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schedules = Schedule::all();
        $venues = Venue::where('user_id', auth()->user()->id)->get();
        $fields = Field::whereIn('venue_id', $venues->pluck('id'))->get();
        $orders = Order::whereIn('field_id', $fields->pluck('id'))->get();
        return view('pages.owner.order', compact('orders', 'fields', 'venues', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
        Order::create($request->validated());
        return redirect()->route('owner-order.index')->with('success', 'Order has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $owner_order)
    {
        //
        if ($owner_order) {
            $owner_order->update($request->validated());
            return redirect()->route('owner-order.index')->with('success', 'Order has been updated');
        }
        return redirect()->route('owner-order.index')->with('error', 'Order not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $owner_order)
    {
        //
        if ($owner_order) {
            $owner_order->delete();
            return redirect()->route('owner-order.index')->with('success', 'Order has been deleted');
        }
        return redirect()->route('owner-order.index')->with('error', 'Order not found');
    }
}
