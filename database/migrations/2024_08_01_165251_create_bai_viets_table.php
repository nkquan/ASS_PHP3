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
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->unsignedInteger('bai_viet_id');
            $table->timestamps();
            $table->foreign('bai_viet_id')->references('id')->on('danh_muc_bai_viets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_viets');
    }
};
