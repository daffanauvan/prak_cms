@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="font-weight:700;color:#c59d5f;"><i class="fa fa-coffee"></i> Menu Kopi OnStreet</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($coffees as $coffee)
            <div class="col">
                <div class="card h-100 shadow-sm border-0" style="border-radius:18px;">
                    <img src="/img/g{{ $coffee->id ?? 1 }}.jpg" class="card-img-top" alt="{{ $coffee->nama }}" style="height:180px;object-fit:cover;border-top-left-radius:18px;border-top-right-radius:18px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title" style="color:#c59d5f;font-weight:600;"><i class="fa fa-mug-hot"></i> {{ $coffee->nama }}</h5>
                        <p class="card-text" style="flex:1;">{{ $coffee->deskripsi }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold" style="font-size:1.2rem;color:#b08d4f;">Rp {{ number_format($coffee->harga, 0, ',', '.') }}</span>
                            <a href="{{ route('order.form') }}" class="btn btn-sm btn-gradient" style="background:linear-gradient(45deg,#c59d5f,#d4af7a);color:#fff;font-weight:600;border-radius:8px;"><i class="fa fa-shopping-cart"></i> Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection