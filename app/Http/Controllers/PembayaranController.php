<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        // Tampilkan halaman pembayaran
        return view('Pembayaran.pembayaran');
    }

    public function store(Request $request)
    {
        \Log::info('POST pembayaran.store', $request->all());

        $validated = $request->validate([
            'METODE_BAYAR' => 'required|string|max:255',
            'STATUS_BAYAR' => 'required|string|max:255',
        ]);

        try {
            // Ambil data dari session
            $order_id = session('order_id');
            $nama = session('nama');
            $kopi = session('kopi');
            $jumlah = session('jumlah');
            $total = session('total');

            if (!$order_id) {
                \Log::error('order_id tidak ditemukan di session');
                return redirect()->route('orders.create')
                    ->with('error', 'Data pesanan tidak ditemukan. Silakan pesan ulang.');
            }

            // Cari order yang sudah ada
            $order = Order::find($order_id);
            if (!$order) {
                \Log::error('Order tidak ditemukan di database, id: ' . $order_id);
                return redirect()->route('orders.create')
                    ->with('error', 'Pesanan tidak ditemukan. Silakan pesan ulang.');
            }

            // Simpan data pembayaran ke database Oracle
            $pembayaran = Pembayaran::create([
                'ID_ORDER' => $order_id,
                'TANGGAL_BAYAR' => DateHelper::formatForOracle(), // Format tanggal untuk Oracle
                'METODE_BAYAR' => $validated['METODE_BAYAR'],
                'STATUS_BAYAR' => $validated['STATUS_BAYAR'],
            ]);

            // Simpan metode pembayaran ke session
            session(['metode_bayar' => $validated['METODE_BAYAR']]);

            // Redirect berdasarkan metode pembayaran
            $metode = $validated['METODE_BAYAR'];
            \Log::info('Redirect ke pembayaran.proses', ['metode' => $metode]);
            return redirect()->route('pembayaran.proses', ['metode' => $metode])
                ->with('success', 'Pembayaran berhasil disimpan!');

        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error('Error saving payment: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan pembayaran. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function prosesPembayaran(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
        ]);

        $metode = $request->input('metode_pembayaran');
        // Simpan ke session jika perlu
        session(['metode_bayar' => $metode]);

        // Redirect ke instruksi pembayaran sesuai metode
        return redirect()->route('pembayaran.proses', ['metode' => $metode]);
    }

    public function proses($metode)
    {
        if ($metode === 'bank') {
            return view('pembayaran.proses_bank');
        } elseif ($metode === 'ewallet') {
            return view('pembayaran.proses_ewallet');
        } elseif ($metode === 'kartu') {
            return view('pembayaran.proses_kartu');
        }
        abort(404);
    }

    // Method untuk menyelesaikan pembayaran
    public function completePayment(Request $request)
    {
        try {
            $order_id = session('order_id');
            
            \Log::info('CompletePayment called with order_id: ' . $order_id);
            
            if (!$order_id) {
                \Log::error('No order_id found in session');
                return redirect()->route('orders.create')
                    ->with('error', 'Data pesanan tidak ditemukan.');
            }

            // Cari order dan pembayaran
            $order = Order::find($order_id);
            if (!$order) {
                \Log::error('Order not found with ID: ' . $order_id);
                return redirect()->route('orders.create')
                    ->with('error', 'Pesanan tidak ditemukan.');
            }

            \Log::info('Order found: ' . $order->NAMA . ' - ' . $order->COFFEE);

            // Update status pembayaran menjadi 'LUNAS'
            $pembayaran = Pembayaran::where('ID_ORDER', $order_id)->first();
            if ($pembayaran) {
                $pembayaran->update([
                    'STATUS_BAYAR' => 'LUNAS',
                    'TANGGAL_BAYAR' => DateHelper::formatForOracle()
                ]);
                \Log::info('Payment updated to LUNAS for order: ' . $order_id);
            } else {
                \Log::warning('No payment record found for order: ' . $order_id);
                // Jika tidak ada record pembayaran, buat baru
                $pembayaran = Pembayaran::create([
                    'ID_ORDER' => $order_id,
                    'TANGGAL_BAYAR' => DateHelper::formatForOracle(),
                    'METODE_BAYAR' => 'Transfer Bank', // Default method
                    'STATUS_BAYAR' => 'LUNAS'
                ]);
                \Log::info('New payment record created for order: ' . $order_id);
            }

            // Simpan order_id ke session untuk riwayat
            session(['completed_order_id' => $order_id]);
            \Log::info('Completed order_id saved to session: ' . $order_id);

            // Clear session data pesanan
            session()->forget(['order_id', 'nama', 'kopi', 'jumlah', 'total', 'harga_satuan']);
            \Log::info('Session data cleared');

            // Verifikasi data tersimpan di database
            $savedOrder = Order::with('pembayarans')->find($order_id);
            $savedPayment = Pembayaran::where('ID_ORDER', $order_id)->first();
            
            \Log::info('Verification - Order exists: ' . ($savedOrder ? 'YES' : 'NO'));
            \Log::info('Verification - Payment exists: ' . ($savedPayment ? 'YES' : 'NO'));
            if ($savedPayment) {
                \Log::info('Payment status: ' . $savedPayment->STATUS_BAYAR);
            }

            return redirect()->route('orders.history')
                ->with('success', 'Pembayaran berhasil diselesaikan! Pesanan Anda telah masuk ke riwayat transaksi.');

        } catch (\Exception $e) {
            \Log::error('Error completing payment: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyelesaikan pembayaran: ' . $e->getMessage());
        }
    }

    public function status()
    {
        $order_id = session('completed_order_id') ?? session('order_id');
        
        if (!$order_id) {
            return redirect()->route('pembayaran')
                ->with('error', 'Data transaksi tidak ditemukan.');
        }

        try {
            // Ambil data order dengan relasi pembayaran
            $order = Order::with('pembayarans')->find($order_id);
            
            if (!$order) {
                return redirect()->route('orders.create')
                    ->with('error', 'Pesanan tidak ditemukan.');
            }

            return view('Status_Transaksi.status', compact('order'));

        } catch (\Exception $e) {
            \Log::error('Error retrieving order status: ' . $e->getMessage());
            
            return redirect()->route('orders.create')
                ->with('error', 'Terjadi kesalahan saat mengambil status pesanan.');
        }
    }

    // Method untuk menampilkan semua pembayaran (admin)
    public function allPayments()
    {
        try {
            $pembayarans = Pembayaran::with('order')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('Pembayaran.all_payments', compact('pembayarans'));

        } catch (\Exception $e) {
            \Log::error('Error retrieving payments: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengambil data pembayaran.');
        }
    }

    // Method untuk update status pembayaran
    public function updateStatus(Request $request, $id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->update([
                'STATUS_BAYAR' => $request->status
            ]);

            return redirect()->back()
                ->with('success', 'Status pembayaran berhasil diperbarui!');

        } catch (\Exception $e) {
            \Log::error('Error updating payment status: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui status pembayaran.');
        }
    }
}
