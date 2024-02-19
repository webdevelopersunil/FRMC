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
        Schema::create('nodal_additional_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('complain_id')->unsigned();
            $table->bigInteger('nodal_id')->unsigned();
            $table->text('description')->required();
            $table->text('file')->required();
            // $table->text('path')->required();
            // $table->text('mime')->required();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodal_additional_details');
    }
};
