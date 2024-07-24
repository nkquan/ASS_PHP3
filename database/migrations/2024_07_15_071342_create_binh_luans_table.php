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
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('san_pham_id');
            $table->unsignedInteger('tai_khoan_id');
            $table->text('noi_dung');
            $table->date('ngay_dang');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();
            $table->foreign('san_pham_id')->references('id')->on('san_phams');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
