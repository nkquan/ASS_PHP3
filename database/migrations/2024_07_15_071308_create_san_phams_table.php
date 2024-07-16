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
            $table->string('ten_san_pham');
            $table->double('gia_san_pham',8,2);
            $table->double('gia_khuyen_mai',8,2);
            $table->text('hinh_anh');
            $table->integer('so_luong')->nullable();
            $table->integer('luot_xem');
            $table->date('ngay_nhap');
            $table->text('mo_ta')->nullable();
            $table->unsignedInteger('danh_muc_id');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();   
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
