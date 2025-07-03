<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DateHelper;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'PEMBAYARAN';       // Nama tabel Oracle
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'ID_ORDER',
        'TANGGAL_BAYAR',
        'METODE_BAYAR',
        'STATUS_BAYAR'
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'ID_ORDER', 'ID');
    }

    // Accessor untuk format tanggal pembayaran
    public function getTanggalBayarFormattedAttribute()
    {
        return DateHelper::formatDate($this->TANGGAL_BAYAR);
    }

    // Accessor untuk status badge class
    public function getStatusBadgeClassAttribute()
    {
        $status = strtolower($this->STATUS_BAYAR);
        switch ($status) {
            case 'lunas':
                return 'status-lunas';
            case 'pending':
                return 'status-pending';
            case 'dibatalkan':
                return 'status-dibatalkan';
            default:
                return 'status-pending';
        }
    }

    // Scope untuk filter berdasarkan status
    public function scopeByStatus($query, $status)
    {
        return $query->where('STATUS_BAYAR', $status);
    }

    // Scope untuk filter berdasarkan metode pembayaran
    public function scopeByMetode($query, $metode)
    {
        return $query->where('METODE_BAYAR', $metode);
    }
}
