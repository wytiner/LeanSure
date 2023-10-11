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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insured_id');
            $table->string('axa_claim_id');
            $table->date('loss_date');
            $table->date('incept_date');
            $table->string('subject');
            $table->decimal('excess', 8, 2);
            $table->text('summary');
            $table->unsignedBigInteger('handler_id');
            $table->unsignedBigInteger('loss_adjuster_id')->nullable();
            $table->timestamps();

            $table->foreign('insured_id')->references('id')->on('insureds');
            $table->foreign('handler_id')->references('id')->on('handlers');
            $table->foreign('loss_adjuster_id')->references('id')->on('loss_adjusters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
};
