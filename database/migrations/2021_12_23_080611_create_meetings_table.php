<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('host_id')->nullable();
            $table->time('start', $precision = 0)->nullable();
            $table->time('end', $precision = 0)->nullable();
            $table->date('day')->nullable();
            $table->string('status')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();
            $table->foreign('host_id')->references('id')->on('admin_panels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
