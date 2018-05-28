<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matricule');
            $table->integer('matiere_id')->unsigned();
            $table->float('note',5,3)->nullable()->default(0);

            $table->foreign('matricule')
              ->references('matricule')->on('etudiant')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            $table->foreign('matiere_id')
              ->references('id')->on('matiere')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            $table->unique(['matricule','matiere_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note');
    }
}
