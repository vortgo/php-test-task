<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->integer('sector_id')->unsigned();
            $table->integer('row_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->integer('match_id')->unsigned();
            $table->string('status');

            $table->index(["sector_id"], 'fk_reservations_sector_id');

            $table->foreign('sector_id', 'fk_reservations_sector_id')
                ->references('id')->on('sectors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index(["row_id"], 'fk_reservations_row_id');

            $table->foreign('row_id', 'fk_reservations_row_id')
                ->references('id')->on('rows')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index(["place_id"], 'fk_reservations_place_id');

            $table->foreign('place_id', 'fk_reservations_place_id')
                ->references('id')->on('places')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index(["match_id"], 'fk_reservations_match_id');

            $table->foreign('match_id', 'fk_reservations_match_id')
                ->references('id')->on('matches')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('reservations');
    }
}
