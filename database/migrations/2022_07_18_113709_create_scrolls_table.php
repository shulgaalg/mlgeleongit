<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrolls', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('offer',500);
            $table->string('description',500);
            $table->string('header',500);
            $table->string('imagepath',500);
            $table->smallInteger('typeScroll');
            $table->unsignedBigInteger('formId');
            $table->foreign('formId')->references('id')->on('forms');
            $table->text('html');         

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
        Schema::dropIfExists('scrolls');
    }
};
