<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar</title>
</head>
<body>
    <h2>Form Upload Gambar</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Form Upload -->
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="title"><br><br>

        <label>Pilih Gambar:</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Upload</button>
    </form>

    <hr>

    <!-- Daftar Gambar -->
    @if ($images->count() > 0)
        <h3>Daftar Gambar:</h3>
        @foreach ($images as $image)
            <div style="margin-bottom: 20px;">
                <strong>{{ $image->title }}</strong><br>
                <img src="{{ asset('storage/' . $image->image_path) }}" width="200"><br>

                <form action="{{ route('image.delete', $image->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red;">Hapus Gambar</button>
                </form>
            </div>
        @endforeach
    @endif
</body>
</html>
