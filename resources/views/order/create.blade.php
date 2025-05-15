@extends('layouts.app')

@section('content')
    <h2>Form Pemesanan Kopi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('order.submit') }}">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anda</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="coffee_id" class="form-label">Pilih Kopi</label>
            <select name="coffee_id" class="form-select" required>
                @foreach ($coffees as $coffee)
                    <option value="{{ $coffee->id }}">
                        {{ $coffee->nama }} - Rp{{ number_format($coffee->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
@endsection
