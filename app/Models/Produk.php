<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Produk extends Model
{
    use HasUuids;
    protected $table = 'table_produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'foto_url',
        'status',
        'id_kategori_produk',
    ];
     public $timestamps = true;
     public $incrementing = false;

        public function kategori()
        {
            return $this->belongsTo(Kategori::class, 'id_kategori_produk');
        }
}
