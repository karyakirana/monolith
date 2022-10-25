<?php namespace App\Models\Master;

trait ProdukModelTrait
{
    public function produk()
    {
        return $this->bnelongsTo(Produk::class, 'produk_id');
    }
}
