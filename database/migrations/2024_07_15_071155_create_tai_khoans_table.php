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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ho_ten');
            $table->string('anh_dai_dien')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('email')->unique();
            $table->string('so_dien_thoai');
            $table->boolean('gioi_tinh')->default(0);
            $table->string('dia_chi');
            $table->string('mat_khau');
            $table->unsignedInteger('chuc_vu_id');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
