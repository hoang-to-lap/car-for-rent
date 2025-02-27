<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->text('content'); 
            $table->text('description')->nullable();
            $table->unsignedBigInteger('id_categorynews'); // Khóa ngoại liên kết danh mục
            $table->foreign('id_categorynews')->references('id')->on('news_categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // Hỗ trợ xóa mềm
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
