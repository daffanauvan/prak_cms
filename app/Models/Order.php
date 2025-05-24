<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'ORDERS';         // Nama tabel Oracle
    protected $primaryKey = 'ID';        // Kolom primary key
    public $incrementing = true;         // Karena pakai identity (auto-increment)
    public $timestamps = true;           // created_at & updated_at aktif

    protected $fillable = ['NAMA', 'COFFEE', 'JUMLAH'];
}

