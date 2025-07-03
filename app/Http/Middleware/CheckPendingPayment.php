<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class CheckPendingPayment
{
    public function handle(Request $request, Closure $next)
    {
        $idOrder = $request->query('id_order');

        if (!$idOrder) {
            return response('ID Order tidak ditemukan di URL.', 400);
        }

        $pembayaran = Pembayaran::where('ID_ORDER', $idOrder)
                                ->where('STATUS_BAYAR', 'PENDING')
                                ->first();

        if (!$pembayaran) {
            return response('Tidak ada pembayaran tertunda untuk Order ini.', 403);
        }

        return $next($request);
    }
}
