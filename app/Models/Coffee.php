<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $table = 'COFFEE';     // ← HARUS sesuai nama tabel di Oracle
    protected $primaryKey = 'ID';    // ← pastikan sesuai kolom primary key
    public $incrementing = false;    // ← jika ID tidak auto-increment
    public $timestamps = true;      // ← jika tidak ada created_at/updated_at
    protected $guarded = [];         // atau ['ID']
}
