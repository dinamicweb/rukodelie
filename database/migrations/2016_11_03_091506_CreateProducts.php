<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); //id товара
            $table->string('title'); //наименование
            $table->string('url'); //ссылка
            $table->string('stock'); //остаток
            $table->string('sku'); //артикул
            $table->string('category_id'); //категория
            $table->string('units_id'); //ед.измерения
            $table->string('colors_id'); //цвета
            $table->string('description'); //описание
            $table->string('img'); //фото
            $table->string('price'); //цена
            $table->string('compare_price'); //старая цена
            $table->string('new'); //новинки
            $table->string('heft'); //вес
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
