<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        $images = Image::all();
        return view('upload', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $image = Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        return redirect('/upload')->with('success', 'Gambar berhasil diupload.');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if (Storage::exists('public/' . $image->image_path)) {
            Storage::delete('public/' . $image->image_path);
        }

        $image->delete();

        return redirect('/upload')->with('success', 'Gambar berhasil dihapus.');
    }
}
