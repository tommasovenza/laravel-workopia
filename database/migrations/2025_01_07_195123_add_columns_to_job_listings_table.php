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
        Schema::table('job_listings', function (Blueprint $table) {
            // create col
            $table->unsignedBigInteger('user_id');
            // set as foreign key
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            // add all new columns
            $table->integer('salary');
            $table->enum('job_type', ['Full-Time', 'Part-Time', 'On-Call'])->default('Full-Time');
            $table->boolean('remote')->default(false);
            $table->text('requirements');
            $table->text('benefits');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('company_name');
            $table->text('company_description')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            // drop all columns
            $table->dropColumn('user_id');
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('salary');
            $table->dropColumn('job_type');
            $table->dropColumn('remote');
            $table->dropColumn('requirements');
            $table->dropColumn('benefits');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zipcode');
            $table->dropColumn('contact_email');
            $table->dropColumn('contact_phone');
            $table->dropColumn('company_name');
            $table->dropColumn('company_description');
            $table->dropColumn('company_logo');
        });
    }
};
