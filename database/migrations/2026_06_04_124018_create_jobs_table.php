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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('job_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->longText('description');

            $table->string('location');

            $table->decimal('salary', 10, 2)->nullable();

            $table->integer('experience')->default(0);

            $table->enum('job_type', [
                'full_time',
                'part_time',
                'remote',
                'internship'
            ]);

            $table->date('deadline');

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
