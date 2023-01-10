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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->timestamps();
        });


        Schema::create('lead_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('lead_id');
            $table->timestamps();

            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });

        Schema::create('curriculum_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('curriculum_id');
            $table->timestamps();

            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('curriculum_id')->references('id')->on('curriculums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
        Schema::dropIfExists('lead_note');
        Schema::dropIfExists('curriculum_note');
    }
};
