<?php namespace App\Core\SubStock;

use App\Models\Stock\StockMutasi;

class StockKeluarMutasi extends StockKeluarRepository
{
    public function __construct(StockMutasi $stockMutasi)
    {
        $kondisi = $stockMutasi->jenis_mutasi;
        $this->data = [
            'active_cash'=>$stockMutasi->active_cash,
            'kode'=>self::kode($kondisi),
            'stockable_keluar_type'=>$stockMutasi::class,
            'stockable_keluar_id'=>$stockMutasi->id,
            'supplier_id'=>null,
            'kondisi'=>$kondisi,
            'gudang_id'=>$stockMutasi->gudang_asal_id,
            'tgl_keluar'=>$stockMutasi->tgl_mutasi,
            'user_id'=>$stockMutasi->user_id,
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
