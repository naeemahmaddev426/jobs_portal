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
        if (!Schema::hasTable('job_applications')) {
            return;
        }

        Schema::table('job_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('job_applications', 'user_id')) {
                $table->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnDelete()
                    ->after('id');
            }

            if (!Schema::hasColumn('job_applications', 'job_post_id')) {
                $table->foreignId('job_post_id')
                    ->constrained('job_posts')
                    ->cascadeOnDelete()
                    ->after('user_id');
            }

            if (!Schema::hasColumn('job_applications', 'cv')) {
                $table->string('cv')->nullable()->after('job_post_id');
            }

            if (!Schema::hasColumn('job_applications', 'cover_letter')) {
                $table->text('cover_letter')->nullable()->after('cv');
            }

            if (!Schema::hasColumn('job_applications', 'status')) {
                $table->enum('status', ['pending', 'shortlisted', 'rejected'])
                    ->default('pending')
                    ->after('cover_letter');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('job_applications')) {
            return;
        }

        Schema::table('job_applications', function (Blueprint $table) {
            if (Schema::hasColumn('job_applications', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('job_applications', 'cover_letter')) {
                $table->dropColumn('cover_letter');
            }

            if (Schema::hasColumn('job_applications', 'cv')) {
                $table->dropColumn('cv');
            }

            if (Schema::hasColumn('job_applications', 'job_post_id')) {
                $table->dropForeign(['job_post_id']);
                $table->dropColumn('job_post_id');
            }

            if (Schema::hasColumn('job_applications', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
