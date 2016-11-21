<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarianst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->increments('id'); //id варианта
            $table->integer('products_id'); //id товара
            $table->string('color_id'); //остаток
            $table->integer('units_id_one'); //ед.измерения 1
            $table->integer('units_id_too'); //ед.измерения 1
            $table->string('price_one'); //цена за опт
            $table->string('price_too'); //цена за розницу
            $table->string('compare_price_one'); //старая цена опт
            $table->string('compare_price_too'); //старая цена розница
            $table->string('stock_one'); //Остаток 1 ед изм
            $table->string('stock_too'); //Остаток второй ед. изм
            $table->string('heft_one'); //Вес 1 й ед изм
            $table->string('heft_too'); //Вес 2 й ед изм
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
