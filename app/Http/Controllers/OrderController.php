<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Order;
use App\Models\Pembayaran;

class OrderController extends Controller
{
    public function create()
    {
        return view('order.create');
    }

    public function index()
    {
        // Ambil semua order dengan relasi pembayaran
        $orders = Order::with('pembayarans')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('order.history', compact('orders'));
    }

    public function history()
    {
        try {
            // Ambil semua order dengan relasi pembayaran untuk riwayat
            $orders = Order::with('pembayarans')
                ->orderBy('created_at', 'desc')
                ->get();

            \Log::info('History method called. Found ' . $orders->count() . ' orders');
            
            // Log setiap order untuk debugging
            foreach ($orders as $order) {
                \Log::info('Order ID: ' . $order->ID . ', Nama: ' . $order->NAMA . ', Coffee: ' . $order->COFFEE . ', Pembayaran: ' . $order->pembayarans->count());
            }

            return view('order.history', compact('orders'));

        } catch (\Exception $e) {
            \Log::error('Error in history method: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengambil riwayat pesanan: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'NAMA' => 'required|string|max:255',
            'COFFEE' => 'required|string|max:255',
            'JUMLAH' => 'required|integer|min:1',
        ]);

        // Daftar harga kopi yang sesuai dengan yang ditampilkan di view
        $hargaKopi = [
            'Cappuccino' => 25000,
            'Americano' => 18000,
            'Espresso' => 17000,
            'Macchiato' => 28000,
            'Mocha' => 28000,
            'Coffee Latte' => 28000,
            'Piccolo Latte' => 30000,
            'Ristretto' => 28000,
            'Affogato' => 32000,
        ];

        $harga = $hargaKopi[$validated['COFFEE']] ?? 0;
        $total = $harga * $validated['JUMLAH'];

        // Simpan ke database
        $order = Order::create([
            'NAMA' => $validated['NAMA'],
            'COFFEE' => $validated['COFFEE'],
            'JUMLAH' => $validated['JUMLAH'],
            'TOTAL_HARGA' => $total,
        ]);

        // Simpan ke session untuk halaman pembayaran
        session([
            'order_id' => $order->ID,
            'nama' => $validated['NAMA'],
            'kopi' => $validated['COFFEE'],
            'jumlah' => $validated['JUMLAH'],
            'harga_satuan' => $harga,
            'total' => $total,
        ]);

        \Log::info('OrderController@store - session after set', session()->all());

        return redirect()->route('pembayaran');
    }

    public function pembayaran()
    {
        return view('Pembayaran.create');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.history')->with('success', 'Order berhasil dihapus dari riwayat.');
    }
}