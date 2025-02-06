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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string(column:'name');
            $table->string(column:'price_ngay');
            $table->string(column:'price_thang')->nullable();
            $table->string(column:'price_nam')->nullable();
            $table->string(column:'feature_image_path')->nullable();
            $table->text(column:'content');
            $table->integer(column:'user_id');
            $table->integer(column:'category_id');
            $table->integer(column:'seat');
            $table->integer(column:'year');
            $table->enum('status', ['visible', 'hidden'])->default('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
