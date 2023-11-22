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
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acro');
            $table->string('mission');
            $table->string('vision');
            $table->binary('logo');
            $table->binary('consti_and_byLaws');
            $table->binary('letter_of_intent');
            $table->string('adviser_info');
            $table->string('officer_info');
            $table->binary('admin_endorsement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization');
    }
};
