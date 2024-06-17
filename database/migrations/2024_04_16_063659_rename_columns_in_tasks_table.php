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
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('quantityPodomoro', 'quantity_podomoro');
            $table->renameColumn('deadline', 'due_date_at');
            $table->renameColumn('status', 'is_completed');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('quantityPodomoro', 'quantity_podomoro');
            $table->renameColumn('deadline', 'due_date_at');
            $table->renameColumn('status', 'is_completed');
        });
    }
};
