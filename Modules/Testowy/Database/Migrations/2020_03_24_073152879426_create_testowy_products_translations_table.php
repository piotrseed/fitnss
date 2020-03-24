<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestowyProductsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testowy__products_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('products_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['products_id', 'locale']);
            $table->foreign('products_id')->references('id')->on('testowy__products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testowy__products_translations', function (Blueprint $table) {
            $table->dropForeign(['products_id']);
        });
        Schema::dropIfExists('testowy__products_translations');
    }
}
