<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssocierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associer', function (Blueprint $table) {
            $table->integer('id_matiere');
            $table->integer('id_departement');

            $table->foreign('id_matiere')
            ->references('id_matiere')->on('matiere')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('associer');
    }
}
