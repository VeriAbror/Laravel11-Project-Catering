<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Tentukan nama tabel
    protected $table = 'orders';

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'customer_id',
        'event_date',
        'total_price',
        'payment_method',
        'order_status',
        'details',
    ];

    // Setiap order memiliki satu customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id_pelanggan');
    }

    // Set kolom details agar otomatis terkonversi menjadi array
    protected $casts = [
        'details' => 'array',  // Menyimpan details sebagai array (bukan JSON string)
    ];

    // Menyimpan details sebagai JSON di database
    public static function boot()
    {
        parent::boot();

        static::saving(function ($order) {
            if (is_array($order->details)) {
                $order->details = json_encode($order->details);
            }
        });
    }
}
