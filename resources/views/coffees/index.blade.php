@extends('layouts.app')

@section('content')
    <h1>Menu Kopi OnStreet</h1>

    <ul class="menu">
        @foreach ($coffees as $coffee)
            <li>
                <h5>{{ $coffee->nama }}</h5>
                <p>{{ $coffee->deskripsi }}</p>
                <span>Rp {{ number_format($coffee->harga, 0, ',', '.') }}</span>
                <div>
                    <a href="{{ route('coffees.edit', $coffee) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('coffees.destroy', $coffee) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
