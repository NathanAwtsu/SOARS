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
            $table->id()->autoIncrement();
            $table->integer('requirement_status')->nullable();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('type_of_organization')->nullable();
            $table->string('mission')->nullable();
            $table->string('vision')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('consti_and_byLaws')->nullable();
            $table->mediumText('letter_of_intent')->nullable();
            //Adviser
            $table->string('adviser_name')->nullable();
            $table->string('adviser_email')->nullable();
            //AUSG
            $table->string('ausg_rep_studentno')->nullable();

            //President
            //VP Internal
            //VP external
            //Secretary
            //Treasurer
            //Auditor
            //PRO
            $table->mediumText('admin_endorsement')->nullable();
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
