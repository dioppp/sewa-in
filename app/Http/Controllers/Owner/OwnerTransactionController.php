<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Venue;
use Illuminate\Http\Request;

class OwnerTransactionController extends Controller
{
    //
    public function index()
    {
        $venues = Venue::where('user_id', auth()->user()->id)->get();
        $fields = Field::whereIn('venue_id', $venues->pluck('id'))->get();
        $orders = Order::whereIn('field_id', $fields->pluck('id'))->get();
        $transactions = Transaction::whereIn('order_id', $orders->pluck('id'))->get();
        return view('pages.owner.transaction', compact('transactions'));
    }
}
