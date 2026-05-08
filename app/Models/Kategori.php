<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kategori extends Model
{
    use hasuuids;
    protected $table = 'table_kategori_produk';
    protected $primaryKey = 'id_kategori_produk';
    protected $fillable = [
        'nama_kategori_produk',
    ];
    public $timestamps = false;
    public $incrementing = false;
}
