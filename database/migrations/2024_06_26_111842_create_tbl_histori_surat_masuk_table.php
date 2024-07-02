<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_histori_surat_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_surat');
            $table->integer('id_validasi');
            $table->enum('stts_surat', [""]);
            $table->string('file_pendukung');
            $table->longText('keterangan');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_histori_surat_masuk');
    }
};
