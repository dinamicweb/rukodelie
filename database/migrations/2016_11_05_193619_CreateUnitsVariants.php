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
            $table->increments('id'); //id ��������
            $table->integer('variants_id'); //id ��������
            $table->integer('units_id'); //��.���������
            $table->string('price'); //����
            $table->string('compare_price'); //������ ���� ��������
            $table->string('stock'); //�������
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
