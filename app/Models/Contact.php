<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function phones()
    {
        return $this->HasMany(Phone::class);
    }

    public function emails()
    {
        return $this->HasMany(Email::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'contact_tags');
    }
} 
