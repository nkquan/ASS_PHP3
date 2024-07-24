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
        Schema::create('hinh_anh_san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('san_pham_id');
            $table->string('link_hinh_anh');
            $table->timestamps();
            $table->foreign('san_pham_id')->references('id')->on('san_phams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh_san_phams');
    }
};
