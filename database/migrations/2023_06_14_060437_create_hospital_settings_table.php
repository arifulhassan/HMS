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
        Schema::create('hospital_settings', function (Blueprint $table) {
            $table->id();

            //  Basic information's

            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->dateTime('establish')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();

            // Social Media
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();

            // Mail Drivers Config

            $table->string('driver')->nullable();
            $table->string('encryption')->nullable();
            $table->string('host')->nullable();
            $table->integer('port')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('email_from')->nullable();
            $table->string('email_from_name')->nullable();


            //  Invoice Settings Config
            $table->string('invoice_prefix')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('user_prefix')->nullable();
            $table->string('patient_prefix')->nullable();
            $table->integer('invoice_number_mode')->nullable();
            $table->string('invoice_last_number')->nullable();

            // Tax config
            $table->string('taxes')->default(0);
            $table->string('discount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_settings');
    }
};
