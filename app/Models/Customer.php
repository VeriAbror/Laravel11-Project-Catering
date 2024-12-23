<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Tentukan nama kolom primary key yang benar
    protected $primaryKey = 'id_pelanggan';  // Ganti 'id' menjadi 'id_pelanggan'

    // Tentukan apakah kolom primary key menggunakan auto-increment
    public $incrementing = true;  // Mengatur apakah primary key auto increment atau tidak

    // Tentukan tipe data kolom primary key
    protected $keyType = 'string';  // Menggunakan 'string' karena id_pelanggan menggunakan bigint unsigned

    // Kolom yang bisa diisi secara massal
    protected $fillable = ['nama_pelanggan', 'nomor_telepon', 'alamat'];

    // Relasi dengan model Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
