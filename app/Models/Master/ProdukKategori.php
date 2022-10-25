<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKategori extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produk_kategori';
    protected $fillable = [
        'kode_lokal',
        'nama',
        'keterangan'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'produk_id');
    }
}
