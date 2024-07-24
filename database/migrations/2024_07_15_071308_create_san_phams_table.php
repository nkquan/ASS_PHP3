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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_san_pham')->unique();
            $table->string('ten_san_pham');
            $table->double('gia_san_pham');
            $table->double('gia_khuyen_mai');
            $table->string('hinh_anh')->nullable();
            $table->unsignedInteger('so_luong');
            $table->unsignedBigInteger('luot_xem')->default(0);
            $table->date('ngay_nhap');
            $table->string('mo_ta')->nullable();
            $table->unsignedInteger('danh_muc_id');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();   
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
