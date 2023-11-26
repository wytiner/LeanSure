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
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('subject');
            $table->unsignedBigInteger('scope_id')->nullable();
            $table->foreign('scope_id')->references('id')->on('scope_of_works');
        });
    }

    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->string('subject');
            $table->dropForeign(['scope_id']);
            $table->dropColumn('scope_id');
        });
    }
};
