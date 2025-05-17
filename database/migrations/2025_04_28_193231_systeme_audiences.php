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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('client'); 
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        Schema::create('specialities', function (Blueprint $table) {
            $table->id(); // crée un BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('speciality_id')->constrained('specialities')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medecin_id')->constrained('medecins')->onDelete('cascade');
            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });

        Schema::create('audiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('medecin_id')->constrained('medecins')->onDelete('cascade');
            $table->foreignId('speciality_id')->constrained('specialities')->onDelete('cascade');
            $table->date('scheduled_date_at');
            $table->time('scheduled_time_at');
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'rescheduled', 'completed'])->default('pending');
            $table->text('reason')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->dateTime('rescheduled_to')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('specialties');
        Schema::dropIfExists('medecins');
        Schema::dropIfExists('medecins');
        Schema::dropIfExists('audiences');
    }
};
