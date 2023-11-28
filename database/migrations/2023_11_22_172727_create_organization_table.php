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
            $table->integer('requirement_status');
            $table->string('name');
            $table->string('nickname');
            $table->string('mission');
            $table->string('vision');
            $table->mediumText('logo');
            $table->mediumText('consti_and_byLaws');
            $table->mediumText('letter_of_intent');
            $table->string('adviser_info');
            $table->string('officer_info');
            $table->mediumText('admin_endorsement');
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
