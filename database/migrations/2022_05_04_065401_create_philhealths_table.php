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
        Schema::create('philhealths', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->string('ee_rate');
            $table->string('er_rate');
            $table->string('ph_rate');
            $table->string('ph_cap');
            $table->string('minimum_contribution');
            $table->string('minimum');
            $table->string('maximum');
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
        Schema::dropIfExists('philhealths');
    }
};
