<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produk';
    protected $fillable = [
        'kategori_id',
        'kategori_harga_id',
        'kode',
        'kode_lokal',
        'penerbit',
        'nama',
        'hal',
        'cover',
        'harga',
        'size',
        'deskripsi',
    ];

    public function kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'kategori_id');
    }

    public function kategoriHarga()
    {
        return $this->belongsTo(ProdukKategoriHarga::class, 'kategori_harga_id');
    }
}
