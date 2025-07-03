<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * Format tanggal dengan aman
     */
    public static function formatDate($date, $format = 'd M Y')
    {
        if (!$date) {
            return '-';
        }
        
        try {
            // Jika sudah berupa Carbon instance
            if ($date instanceof Carbon) {
                return $date->format($format);
            }
            
            // Jika berupa string, parse dulu
            return Carbon::parse($date)->format($format);
        } catch (\Exception $e) {
            // Jika gagal parse, return as-is
            return $date;
        }
    }

    /**
     * Format tanggal dan waktu
     */
    public static function formatDateTime($date, $format = 'd M Y, H:i')
    {
        return self::formatDate($date, $format);
    }

    /**
     * Format tanggal untuk Oracle
     */
    public static function formatForOracle($date = null)
    {
        if (!$date) {
            $date = now();
        }
        
        return Carbon::parse($date)->format('Y-m-d');
    }
} 