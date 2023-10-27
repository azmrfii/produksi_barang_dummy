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
        Schema::create('request_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl_request')->nullable();
            $table->foreignId('barang_id')->constrained('barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jml_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_barangs');
    }
};
