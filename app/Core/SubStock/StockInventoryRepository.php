<?php namespace App\Core\SubStock;

use App\Models\Stock\StockInventory;

class StockInventoryRepository
{
    protected $gudangId;
    protected $kondisi;
    protected $produkId;
    protected $jumlah;

    public function __construct(
        $gudangId,
        $kondisi,
        $produkId,
        $jumlah
    )
    {
        $this->gudangId = $gudangId;
        $this->kondisi = $kondisi;
        $this->produkId = $produkId;
        $this->jumlah = $jumlah;
    }

    private function baseQuery()
    {
        return StockInventory::query()->where('active_cash', session('ClosedCash'))
            ->where('gudang_id', $this->gudangId)
            ->where('kondisi', $this->kondisi)
            ->where('produk_id', $this->produkId);
    }

    private function create($field)
    {
        return StockInventory::create([
            'active_cash' => session('ClosedCash'),
            'kondisi' => $this->kondisi,
            'gudang_id' => $this->gudangId,
            $field => $this->jumlah,
            'stock_saldo' => ($field == 'stock_keluar') ? 0 - $this->jumlah : $this->jumlah
        ]);
    }

    public function stockKeluar()
    {
        $query = $this->baseQuery();
        if ($query->exists()){
            $query->increment('stock_keluar', $this->jumlah);
            return $query->decrement('stock_saldo', $this->jumlah);
        }
        return $this->create('stock_keluar');
    }

    public function rollbackStockKeluar()
    {
        $query = $this->baseQuery();
        $query->decrement('stock_keluar', $this->jumlah);
        return $query->increment('stock_saldo', $this->jumlah);
    }

    public function stockMasuk()
    {
        $query = $this->baseQuery();
        if ($query->exists()){
            $query->increment('stock_masuk', $this->jumlah);
            return $query->increment('stock_saldo', $this->jumlah);
        }
        return $this->create('stock_masuk');
    }

    public function rollbackStockMasuk()
    {
        $query = $this->baseQuery();
        $query->decrement('stock_masuk', $this->jumlah);
        return $query->decrement('stock_saldo', $this->jumlah);
    }
}
