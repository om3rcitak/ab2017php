<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMovieidToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("reviews", function(Blueprint $table){
        	$table->integer("movie_id")->unsigned();

        	$table->foreign("movie_id")
        		  ->references("id")->on("movies")
        		  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reviews", function(Blueprint $table){
			$table->dropForeign("reviews_movie_id_foreign");
			$table->dropColumn("movie_id");       	
        });
    }
}
