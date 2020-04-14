<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->integer('rating')->default(1);
            $table->unsignedBigInteger('est_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('est_id')->references('id')->on('establishments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
//        Schema::table('reviews', function (Blueprint $table)
//        {
//            $table->dropForeign('reviews_user_id_foreign');
//            $table->dropColumn('user_id');
//            $table->dropForeign('reviews_est_id_foreign');
//            $table->dropColumn('est_id');
//        });
        /*Schema::table('reviews', function (Blueprint $table)
        {
            $table->dropForeign('reviews_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('reviews_est_id_foreign');
            $table->dropColumn('est_id');
        });*/
    }
}
