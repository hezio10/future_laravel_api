<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Address;
use App\Models\Company;
use App\Models\Tag;
use App\Models\Contact;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("notes");
            $table->date("birthdate");
            $table->string("image");
            $table->string("role");
            $table->foreignIdFor(Address::class, "address_id")->constrained();
            $table->foreignIdFor(Company::class, "company_id")->constrained();
            $table->datetimes();
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_0900_ai_ci');
        });

        Schema::create('contact_tags', function(BluePrint $table) {
            $table->foreignIdFor(Tag::class, "tag_id")->constrained();
            $table->foreignIdFor(Contact::class, "contact_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contact_tags');
    }
};
