<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title','100');
            $table->datetime('date1');
            $table->datetime('date2')->nullable();
            $table->integer('venue_id');
            $table->integer('price');
            $table->string('member','100');
            $table->text('comment','500');
            $table->tinyInteger('category')->default(0);
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
        Schema::dropIfExists('performance');
    }
}
