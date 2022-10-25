<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('gudang_id');
            $table->unsignedBigInteger('user_id');
            $table->date('tgl_nota');
            $table->string('jenis_bayar');
            $table->date('tgl_tempo')->nullable();
            $table->string('status_bayar');
            $table->bigInteger('total_barang');
            $table->bigInteger('ppn')->nullable();
            $table->bigInteger('biaya_lain')->nullable();
            $table->bigInteger('total_bayar');
            $table->text('keterangan');
            $table->integer('print')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
