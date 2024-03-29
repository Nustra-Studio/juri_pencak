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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('arena')->nullable();
            $table->string('babak')->nullable();
            $table->string('biru')->nullable();
            $table->string('merah')->nullable();
            $table->string('juri_1')->nullable();
            $table->string('juri_2')->nullable();
            $table->string('juri_3')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->string('time')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
