<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsVariants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants_units', function (Blueprint $table) {
            $table->increments('id'); //id варианта
            $table->integer('variants_id'); //id варианта
            $table->integer('units_id'); //ед.измерения
            $table->string('price'); //цена
            $table->string('compare_price'); //старая цена варианта
            $table->string('stock'); //Остаток
            $table->string('heft'); //Вес
            $table->rememberToken();
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
        //
    }
}
