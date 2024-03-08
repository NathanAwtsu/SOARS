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
        Schema::create('student_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('constitution_bylaws')->nullable();
            $table->string('letter_of_intent')->nullable();
            $table->string('advisers_info')->nullable();
            $table->string('officers_info')->nullable();
            $table->string('adviser_endorsement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_organizations');
    }
};
