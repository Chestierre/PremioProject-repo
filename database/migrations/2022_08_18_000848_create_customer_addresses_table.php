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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('PresentAddress');
            $table->string('LengthOfStay');
            $table->string('HouseStatus');
            $table->string('HouseProvidedBy')->nullable();
            $table->string('LotStatus');
            $table->string('LotProvidedBy')->nullable();
            $table->boolean('OtherPropertiesTV')->nullable();
            $table->boolean('OtherPropertiesRef')->nullable();
            $table->boolean('OtherPropertiesStereoComponent')->nullable();
            $table->boolean('OtherPropertiesGasRange')->nullable();
            $table->boolean('OtherPropertiesMotorcycle')->nullable();
            $table->boolean('OtherPropertiesComputer')->nullable();
            $table->boolean('OtherPropertiesFarmlot')->nullable();
            $table->string('FarmLotAddress')->nullable();
            $table->string('FarmLotSize')->nullable();
            $table->string('ProvincialAddress');


            $table->timestamps();
            $table->foreignId('customer_id')
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
};
