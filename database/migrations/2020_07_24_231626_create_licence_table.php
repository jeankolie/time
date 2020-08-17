<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licence', function (Blueprint $table) {
            $table->integer('id_licence')->autoIncrement();
            $table->string('nom');
            $table->string('slug');
            $table->integer('ordre');

            $table->integer('id_departement');

            $table->foreign('id_departement')
            ->references('id_departement')->on('departement')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licence');
    }
}
