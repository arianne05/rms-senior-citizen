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
        Schema::create('senior_citizens', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();;
            $table->string('lastname');
            $table->string('suffix')->nullable();
            $table->string('sex');
            $table->date('birthdate');
            $table->string('civil_status');
            $table->string('religion');
            $table->string('birthplace');
            $table->string('gsis')->nullable();
            $table->string('philhealth')->unique()->nullable();
            $table->string('tin')->unique()->nullable();
            $table->string('sss')->unique()->nullable();
            $table->string('contact')->nullable();
            $table->string('beneficiary')->nullable();
            $table->string('contact_beneficiary')->nullable();
            $table->string('status_membership');
            $table->string('house_number');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->string('zipcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senior_citizens');
    }
};
