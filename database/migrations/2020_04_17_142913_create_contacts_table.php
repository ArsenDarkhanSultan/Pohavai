<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('number')->default('+7 777 77 77');
            $table->string('instagram')->default('https://www.instagram.com/barbequebybekirchef/?hl=ru');
            $table->string('website')->default('https://www.jetbrains.com/');
            $table->unsignedBigInteger('est_id')->default(1);
            $table->foreign('est_id')->references('id')->on('establishments')->onDelete('cascade');
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
        Schema::dropIfExists('contacts');
    }
}
