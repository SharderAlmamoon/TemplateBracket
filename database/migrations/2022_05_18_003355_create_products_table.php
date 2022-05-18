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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pname',50)->unique();
            $table->text('pdescription');
            $table->string('pcategory');
            $table->string('psize');
            $table->integer('pcostprice');
            $table->integer('psellprice');
            $table->integer('pquantity')->nullable();
            $table->integer('pstatus')->default(1)->comment('1 for Active 2 For Inactive');
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
        Schema::dropIfExists('products');
    }
};
