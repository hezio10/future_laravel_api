<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Email;
use App\Models\EmailLabel;
use App\Models\Phone;
use App\Models\PhoneLabel;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        PhoneLabel::factory(5)->create();
        EmailLabel::factory(5)->create();
        Contact::factory(5)->create();
        Tag::factory(5)->create();

       DB::table('contact_tags')->insert(
            [
                'contact_id' => 1,
                'tag_id' => 1,
            ],
            
        );
        DB::table('contact_tags')->insert(
            [
                'contact_id' => 1,
                'tag_id' => 3,
            ],
        );
        DB::table('contact_tags')->insert(
            [
                'contact_id' => 3,
                'tag_id' => 4,
            ],
        );
        DB::table('contact_tags')->insert(
           [
                'contact_id' => 4,
                'tag_id' => 4,
            ]
        );
        
        Email::factory(15)->create();
        Phone::factory(15)->create();


    }
}
