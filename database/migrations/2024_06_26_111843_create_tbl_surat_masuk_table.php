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
        Schema::create('tbl_surat_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_surat');
            $table->integer('id_instansi');
            $table->enum('layanan', [""]);
            $table->string('file');
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
        Schema::dropIfExists('tbl_surat_masuk');
    }
};
