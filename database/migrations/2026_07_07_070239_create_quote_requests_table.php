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
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('postcode')->nullable();
            $table->enum('service_type', ['print_file', 'design_print', 'small_batch', 'shop_query', 'other']);
            $table->enum('project_type', ['replacement_part', 'prototype', 'hobby', 'business', 'home_garden', 'sensor_housing', 'bracket_mount', 'other'])->nullable();
            $table->text('description');
            $table->unsignedInteger('quantity')->default(1);
            $table->string('material_preference')->nullable();
            $table->string('colour_preference')->nullable();
            $table->text('measurements')->nullable();
            $table->string('deadline')->nullable();
            $table->string('budget')->nullable();
            $table->enum('status', ['new', 'reviewing', 'quoted', 'accepted', 'rejected', 'completed'])->default('new');
            $table->text('internal_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
