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
        Schema::create('marketgroup_lp', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->unsignedBigInteger('landingpId');
            $table->foreign('landingpId')->references('id')->on('landingps');
            $table->unsignedBigInteger('marketgroupId');
            $table->foreign('marketgroupId')->references('id')->on('marketGroups');
            $table->timestamps();
          }
          );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
