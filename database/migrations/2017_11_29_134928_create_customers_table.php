<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('age')->nullable();
            $table->smallInteger('sex')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->integer('bz_id')->nullable();
            $table->string('phone',20);
            $table->smallInteger('is_married')->nullable();
            $table->string('zhiye')->nullable();
            $table->string('address')->nullable();
            $table->string('zixunren')->nullable();
            $table->string('hz_guanxi')->nullable();
            $table->longText('beizhu')->nullable();
            $table->string('first_zx_time');
            $table->integer('user_id');
            $table->integer('status');// 1已到诊 0已预约 -1随访中 -2黑名单
            $table->integer('sf_num')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
