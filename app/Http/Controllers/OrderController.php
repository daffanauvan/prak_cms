<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Order;

class OrderController extends Controller
{
    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'NAMA' => 'required|string|max:255',
            'COFFEE' => 'required|string|max:255',
            'JUMLAH' => 'required|integer|min:1',
        ]);

        Order::create($validated);

        return redirect()->back()->with('success', 'Pesanan berhasil disimpan!');
    }
}