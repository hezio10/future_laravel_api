<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Contact;
use App\Models\EmailLabel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->foreignIdFor(Contact::class, "contact_id")->constrained();
            $table->foreignIdFor(EmailLabel::class, "label_id")->constrained();
            $table->datatimes();
            $table->charset("utf8mb4");
            $table->collation("utf8mb4_0900_ai_ci");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
