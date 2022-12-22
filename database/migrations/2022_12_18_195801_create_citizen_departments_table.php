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
        Schema::create('citizen_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->nullable()->constrained('citizens')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('list_details')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('citizen_departments');
    }
};
