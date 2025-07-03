<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DateHelper;

class Order extends Model
{
    use HasFactory;

    protected $table = 'ORDERS';         // Nama tabel Oracle
    protected $primaryKey = 'ID';        // Kolom primary key
    public $incrementing = true;         // Karena pakai identity (auto-increment)
    public $timestamps = true;           // created_at & updated_at aktif

    protected $fillable = [
        'NAMA', 
        'COFFEE', 
        'JUMLAH', 
        'TOTAL_HARGA'
    ];

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'ID_ORDER', 'ID');
    }

    // Accessor untuk format tanggal
    public function getCreatedAtAttribute($value)
    {
        return DateHelper::formatDateTime($value);
    }

    // Accessor untuk format total harga
    public function getTotalHargaFormattedAttribute()
    {
        if (!$this->TOTAL_HARGA) {
            return 'Rp 0';
        }
        
        return 'Rp ' . number_format($this->TOTAL_HARGA, 0, ',', '.');
    }
}

