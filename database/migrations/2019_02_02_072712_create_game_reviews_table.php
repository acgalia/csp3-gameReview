<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->text('comment');
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('review_id');
            $table->timestamps();

            //foreign keys
            $table->foreign('game_id')
                  ->references('id')
                  ->on('games')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('review_id')
                  ->references('id')
                  ->on('reviews')
                  ->onDelete('restrict')
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
        Schema::dropIfExists('game_reviews');
    }
}
