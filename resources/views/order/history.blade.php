@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center fw-bold">📋 Riwayat Pemesanan Kopi</h2>
    <div class="text-center mb-4">
        <a href="{{ route('orders.create') }}" class="btn btn-warning shadow-sm">
            <i class="fa fa-plus"></i> Pesan Kopi Baru
        </a>
    </div>
    @if($orders->count() > 0)
        <div class="row g-4">
            @foreach($orders as $order)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary">#{{ $order->ID }}</span>
                                <span class="text-muted small">{{ $order->created_at }}</span>
                            </div>
                            <h5 class="card-title mb-1">{{ $order->NAMA }}</h5>
                            <p class="mb-2">
                                <i class="fa fa-coffee me-1"></i>
                                <strong>{{ $order->COFFEE }}</strong> &times; {{ $order->JUMLAH }} cup
                            </p>
                            <p class="mb-2">
                                <i class="fa fa-money-bill-wave me-1"></i>
                                <span class="fw-bold text-success">{{ $order->total_harga_formatted }}</span>
                            </p>
                            @if($order->pembayarans->count() > 0)
                                @php
                                    $pembayaran = $order->pembayarans->first();
                                    $badgeClass = $pembayaran->STATUS_BAYAR === 'Lunas' ? 'bg-success' : ($pembayaran->STATUS_BAYAR === 'Pending' ? 'bg-warning text-dark' : 'bg-danger');
                                @endphp
                                <span class="badge {{ $badgeClass }} mb-2">
                                    {{ $pembayaran->STATUS_BAYAR }}
                                </span>
                                <div class="small text-muted">
                                    <i class="fa fa-credit-card me-1"></i> {{ $pembayaran->METODE_BAYAR }}<br>
                                    <i class="fa fa-calendar me-1"></i> {{ $pembayaran->tanggal_bayar_formatted }}
                                </div>
                            @else
                                <span class="badge bg-secondary mb-2">Belum Dibayar</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center mt-5">
            <i class="fa fa-coffee fa-2x mb-2"></i>
            <div class="fw-bold">Belum Ada Pesanan</div>
            <div>Yuk, pesan kopi favoritmu sekarang!</div>
            <a href="{{ route('orders.create') }}" class="btn btn-warning mt-3">
                <i class="fa fa-plus"></i> Pesan Sekarang
            </a>
        </div>
    @endif
</div>
@endsection 