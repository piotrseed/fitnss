<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestowyKategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testowy__kategory_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('kategory_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['kategory_id', 'locale']);
            $table->foreign('kategory_id')->references('id')->on('testowy__kategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testowy__kategory_translations', function (Blueprint $table) {
            $table->dropForeign(['kategory_id']);
        });
        Schema::dropIfExists('testowy__kategory_translations');
    }
}
