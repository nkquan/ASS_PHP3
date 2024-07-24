<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_don_hang');
            $table->unsignedInteger('tai_khoan_id');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('sdt_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->date('ngay_dat');
            $table->double('tong_tien');
            $table->string('ghi_chu');
            $table->unsignedInteger('phuong_thuc_thanh_toan_id');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();
            $table->foreign('phuong_thuc_thanh_toan_id')->references('id')->on('phuong_thuc_thanh_toans');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
