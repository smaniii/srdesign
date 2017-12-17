<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InputInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->decimal('tempInside',8,2);
            $table->decimal('tempOutside',8,2);
            $table->decimal('pressure',8,2);
            $table->decimal('PH',8,2);
            $table->boolean('done')->default(false);
            $table->integer("runTime")->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input');
    }
}
