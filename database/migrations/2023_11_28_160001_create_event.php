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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('requirement')->nullable();
            $table->string('organization_name');
            $table->string('activity_title');
            $table->string('type_of_activity');
            $table->dateTime('activity_start_datetime')->nullable();
            $table->dateTime('activity_end_datetime')->nullable();
            $table->string('venue')->nullable();
            $table->integer('participants')->nullable();
            $table->mediumText('partner_organization')->nullable();
            $table->integer('organization_fund')->nullable();
            $table->integer('solidarity_share')->nullable();
            $table->integer('registration_fee')->nullable();
            $table->integer('AUSG_subsidy')->nullable();
            $table->longText('sponsored_by')->nullable();
            $table->integer('ticket_selling')->nullable();
            $table->integer('ticket_control_number')->nullable();
            $table->longText('other_source_of_fund')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
