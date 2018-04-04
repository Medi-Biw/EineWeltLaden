<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->string('id', 24)->primary();
            $table->string('from_1', 24)->nullable();
            $table->string('till_1', 24)->nullable();
			$table->string('from_2', 24)->nullable();
			$table->string('till_2', 24)->nullable();
            $table->string('text', 24)->nullable();
            $table->tinyInteger('override')->default(0);
            $table->tinyInteger('closed')->default(0);
            $table->tinyInteger('two_times')->default(0);
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
        Schema::dropIfExists('openings');
    }
}
