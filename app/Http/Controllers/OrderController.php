<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Order;

class OrderController extends Controller
{
    public function create()
    {
        $coffees = Coffee::all();
        return view('order.create', compact('coffees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'coffee_id' => 'required|exists:coffees,id',
        ]);

        Order::create($validated);

        return redirect()->back()->with('success', 'Pesanan berhasil dikirim!');
    }
}
