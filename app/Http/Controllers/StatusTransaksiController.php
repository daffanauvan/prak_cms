<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusTransaksiController extends Controller
{
    public function kirim(Request $request)
    {
        // Ambil data dari form sebelumnya dan redirect ke halaman struk
        $data = $request->only([
            'nama',
            'kopi',
            'jumlah',
            'total_harga',
            'metode_pembayaran',
            'status_pembayaran'
        ]);

        return redirect()->route('status.transaksi')->with('data', $data);
    }

    public function status()
    {
        $data = session('data');

        // Jika tidak ada data (akses langsung), redirect ke halaman pembayaran
        if (!$data) {
            return redirect('/pembayaran')->with('error', 'Data transaksi tidak ditemukan.');
        }

        return view('status_transaksi.status', compact('data'));
    }
}
