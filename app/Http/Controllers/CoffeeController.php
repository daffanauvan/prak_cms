<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::all();
        return view('coffees.index', compact('coffees'));
    }

    // Show form to create a new coffee
    public function create()
    {
        return view('coffees.create');
    }

    // Store a new coffee
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Use nama
            'deskripsi' => 'required|string', // Use deskripsi
            'harga' => 'required|numeric|min:0', // Use harga
        ]);

        Coffee::create($request->all());
        return redirect()->route('coffees.index');
    }

    // Show form to edit a coffee
    public function edit(Coffee $coffee)
    {
        return view('coffees.edit', compact('coffee'));
    }

    // Update a coffee
    public function update(Request $request, Coffee $coffee)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ]);

        $coffee->update($request->all());
        return redirect()->route('coffees.index');
    }

    // Delete a coffee
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();
        return redirect()->route('coffees.index');
    }
}
