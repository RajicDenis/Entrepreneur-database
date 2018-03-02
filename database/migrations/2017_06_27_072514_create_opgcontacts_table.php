<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpgcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opgcontacts', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('opg_id');
            $table->foreign('opg_id')->references('id')->on('opgs')->onDelete('cascade');
            $table->text('desc');
            $table->date('date');
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
        Schema::drop('opgcontacts');
    }
     
}
