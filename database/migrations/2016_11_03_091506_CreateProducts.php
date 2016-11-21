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
            $table->increments('id'); //id ������
            $table->string('title'); //������������
            $table->string('url'); //������
            $table->string('stock'); //�������
            $table->string('sku'); //�������
            $table->string('category_id'); //���������
            $table->string('units_id'); //��.���������
            $table->string('colors_id'); //�����
            $table->string('description'); //��������
            $table->string('img'); //����
            $table->string('price'); //����
            $table->string('compare_price'); //������ ����
            $table->string('new'); //�������
            $table->string('heft'); //���
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
