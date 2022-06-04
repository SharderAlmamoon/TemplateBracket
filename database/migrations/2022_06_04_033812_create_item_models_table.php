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
        Schema::create('item_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_code')->unique();
            $table->string('iname');
            $table->text('idescription');
            $table->integer('icategory');
            $table->integer('istatus');
            $table->string('iimage');
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
        Schema::dropIfExists('item_models');
    }
};
