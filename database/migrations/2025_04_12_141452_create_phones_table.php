<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Contact;
use App\Models\PhoneLabel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string("phone");
            $table->string("prefix");
            $table->string("flag_link");
            $table->foreignIdFor(Contact::class, "contact_id")->constrained();
            $table->foreignIdFor(PhoneLabel::class, "label_id")->constrained();
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
        Schema::dropIfExists('phones');
    }
};
