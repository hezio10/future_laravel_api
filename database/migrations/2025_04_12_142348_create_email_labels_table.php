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
        Schema::create('email_labels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetimes();
            $table->charset("utf8mb4");
            $table->collation("utf8mb4_0900_ai_ci");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_labels');
    }
};
