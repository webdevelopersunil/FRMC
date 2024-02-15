<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complains', function (Blueprint $table) {

            $table->id();
            $table->string('complain_no')->unique()->required();
            $table->string('complainant_id')->nullable();
            $table->text('description');
            $table->string('work_centre')->required();
            $table->string('department_section')->required();
            $table->string('against_persons')->nullable();
            $table->string('public_status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
