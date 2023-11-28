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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('requirement');
            $table->string('organization_name');
            $table->string('activity_title');
            $table->string('type_of_activity');
            $table->date('activity_start_date');
            $table->date('activity_end_date');
            $table->time('activity_start_time');
            $table->time('activity_end_time');
            $table->string('venue');
            $table->string('venue_type');
            $table->integer('participants');
            $table->mediumText('partner_organization');
            $table->integer('organization_fund');
            $table->integer('solidarity_share');
            $table->integer('registration_fee');
            $table->integer('AUSG_subsidy');
            $table->longText('sponsored_by');
            $table->integer('ticket_selling');
            $table->integer('ticket_control_number');
            $table->longText('other_source_of_fund');
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
