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
            $table->increments('id'); //id ��������
            $table->integer('products_id'); //id ������
            $table->string('color_id'); //�������
            $table->integer('units_id_one'); //��.��������� 1
            $table->integer('units_id_too'); //��.��������� 1
            $table->string('price_one'); //���� �� ���
            $table->string('price_too'); //���� �� �������
            $table->string('compare_price_one'); //������ ���� ���
            $table->string('compare_price_too'); //������ ���� �������
            $table->string('stock_one'); //������� 1 �� ���
            $table->string('stock_too'); //������� ������ ��. ���
            $table->string('heft_one'); //��� 1 � �� ���
            $table->string('heft_too'); //��� 2 � �� ���
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
