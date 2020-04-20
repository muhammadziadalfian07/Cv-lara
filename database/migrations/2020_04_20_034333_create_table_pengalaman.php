<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengalaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',115);
            $table->string('jabatan',115);
            $table->text('deskripsi');
            $table->string('dari',115)->nullable();
            $table->string('sampai',115)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengalaman', function (Blueprint $table) {
            //
        });
    }
}
