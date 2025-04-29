<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('horse')->unique();
            $table->string('trailer')->default('N/A')->nullable();
            $table->string('transporter');
            $table->date('dispatch_date');
            $table->foreignId('mine_id');
            $table->foreignId('convoy_id')->nullable();
            $table->string('driver')->nullable();
            $table->foreignId('client_id');
            $table->foreignId('location_id');
            $table->string('status')->default('Parked');
            $table->text('comment')->nullable();
            $table->string('destination')->nullable();
            $table->string('cargo')->nullable();
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
        Schema::dropIfExists('trucks');
    }
}
