@extends('layouts.app') <!-- atau layout utama Anda -->

@section('content')
<div class="container">
    <h1>Form Pemesanan</h1>
    <p>Silakan isi data pemesanan Anda di bawah ini.</p>

    <form action="/order/submit" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="menu" class="form-label">Menu</label>
            <input type="text" class="form-control" name="menu" required>
        </div>
        <button type="submit" class="btn btn-success">Pesan</button>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    </form>

