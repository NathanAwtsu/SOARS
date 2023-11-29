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
            $table->string('ausg_rep_name')->nullable();
            //President
            $table->string('president_studno')->nullable();
            $table->string('president_name')->nullable();
            //VP Internal
            $table->string('vp_internal_studno')->nullable();
            $table->string('vp_internal_name')->nullable();
            //VP external
            $table->string('vp_external_studno')->nullable();
            $table->string('vp_external_name')->nullable();
            //Secretary
            $table->string('secretary_studno')->nullable();
            $table->string('secretary_name')->nullable();
            //Treasurer
            $table->string('treasurer_studno')->nullable();
            $table->string('treasurer_name')->nullable();
            //Auditor
            $table->string('auditor_studno')->nullable();
            $table->string('auditor_name')->nullable();
            //PRO
            $table->string('pro_studno')->nullable();
            $table->string('pro_name')->nullable();

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
