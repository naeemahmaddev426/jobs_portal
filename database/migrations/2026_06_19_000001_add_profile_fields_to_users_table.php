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
        // Add each column only if it does not already exist to avoid duplicate column errors
        if (!Schema::hasColumn('users', 'photo')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('photo')->nullable()->after('email');
            });
        }

        if (!Schema::hasColumn('users', 'skills')) {
            Schema::table('users', function (Blueprint $table) {
                $table->text('skills')->nullable()->after('photo');
            });
        }

        if (!Schema::hasColumn('users', 'education')) {
            Schema::table('users', function (Blueprint $table) {
                $table->text('education')->nullable()->after('skills');
            });
        }

        if (!Schema::hasColumn('users', 'experience')) {
            Schema::table('users', function (Blueprint $table) {
                $table->text('experience')->nullable()->after('education');
            });
        }

        if (!Schema::hasColumn('users', 'cv')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('cv')->nullable()->after('experience');
            });
        }

        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('candidate')->after('cv');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only drop columns that exist to avoid errors
        $columns = ['photo','skills','education','experience','cv','role'];
        foreach ($columns as $col) {
            if (Schema::hasColumn('users', $col)) {
                Schema::table('users', function (Blueprint $table) use ($col) {
                    $table->dropColumn($col);
                });
            }
        }
    }
};
