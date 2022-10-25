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
        Schema::create('stock_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->string('nomor_surat_jalan')->nullable();
            $table->string('stockable_masuk_type')->nullable();
            $table->unsignedBigInteger('stockable_masuk_id')->nullable();
            $table->string('kondisi');
            $table->unsignedBigInteger('gudang_id');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->date('tgl_masuk');
            $table->unsignedBigInteger('user_id');
            $table->string('nomor_po')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('stock_masuk');
    }
};
