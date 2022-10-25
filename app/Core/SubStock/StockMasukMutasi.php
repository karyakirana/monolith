<?php namespace App\Core\SubStock;

use App\Models\Stock\StockMutasi;

class StockMasukMutasi extends StockMasukRepository
{
    public function __construct(StockMutasi $stockMutasi)
    {
        $kondisi = $stockMutasi->jenis_mutasi;
        $this->data = [
            'active_cash'=>$stockMutasi->active_cash,
            'kode'=>self::kode($kondisi),
            'stockable_masuk_type'=>$stockMutasi::class,
            'stockable_masuk_id'=>$stockMutasi->id,
            'kondisi'=>$kondisi,
            'gudang_id'=>$stockMutasi->gudang_tujuan_id,
            'supplier_id'=>null,
            'tgl_masuk'=>$stockMutasi->tgl_mutasi,
            'user_id'=>$stockMutasi->user_id,
            'nomor_po'=>null,
            'keterangan'=>$stockMutasi->keterangan
        ];

        $this->dataDetail = $stockMutasi->stockMutasiDetail;

        $this->class = $stockMutasi;
    }

    public static function build($stockMutasi)
    {
        return new static($stockMutasi);
    }
}
