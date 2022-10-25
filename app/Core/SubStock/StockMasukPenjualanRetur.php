<?php namespace App\Core\SubStock;

use App\Models\Penjualan\PenjualanRetur;

class StockMasukPenjualanRetur extends StockMasukRepository
{
    public function __construct(PenjualanRetur $penjualanRetur)
    {
        $this->data = [
            'active_cash'=>$penjualanRetur->active_cash,
            'kode'=>self::kode($penjualanRetur->kondisi),
            'stockable_masuk_type'=>$penjualanRetur::class,
            'stockable_masuk_id'=>$penjualanRetur->id,
            'kondisi'=>$penjualanRetur->kondisi,
            'gudang_id'=>$penjualanRetur->gudang_id,
            'supplier_id'=>null,
            'tgl_masuk'=>$penjualanRetur->tgl_nota,
            'user_id'=>$penjualanRetur->user_id,
            'nomor_po'=>null,
            'keterangan'=>$penjualanRetur->keterangan
        ];

        $this->dataDetail = $penjualanRetur->penjualanReturDetail;

        $this->class = $penjualanRetur;
    }

    public static function build($penjualanRetur)
    {
        return new static($penjualanRetur);
    }
}
