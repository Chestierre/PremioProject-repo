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
        Schema::create('unitimages', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('ImageVariation');
            $table->timestamps();

            $table->foreignId('unit_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->index('unit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitimages');
    }
};
