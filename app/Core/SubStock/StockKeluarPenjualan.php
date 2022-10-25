<?php namespace App\Core\SubStock;

use App\Models\Penjualan\Penjualan;

class StockKeluarPenjualan extends StockKeluarRepository
{
    public function __construct(Penjualan $penjualan)
    {
        $this->data = [
            'active_cash'=>$penjualan->active_cash,
            'kode'=>self::kode('baik'),
            'stockable_keluar_type'=>$penjualan::class,
            'stockable_keluar_id'=>$penjualan->id,
            'supplier_id'=>null,
            'kondisi'=>'baik',
            'gudang_id'=>$penjualan->gudang_id,
            'tgl_keluar'=>$penjualan->tgl_nota,
            'user_id'=>$penjualan->user_id,
            'keterangan'=>$penjualan->keterangan,
        ];

        $this->dataDetail = $penjualan->penjualanDetail;

        $this->class = $penjualan;
    }

    public static function build($penjualan)
    {
        return new static($penjualan);
    }
}
