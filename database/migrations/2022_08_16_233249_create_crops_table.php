<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('crop_code')->unique();
            $table->string('crop_name');
            $table->date('start_date');
            $table->date('finish_date');
            $table->integer('land_area');
            $table->string('type_phase');
            $table->string('type_crop');
            $table->text("body");
            $table->text("cover");
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
        Schema::dropIfExists('crops');
    }
}
