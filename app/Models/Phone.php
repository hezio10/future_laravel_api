<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PhoneLabel;
use App\Models\Contact;

class Phone extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneFactory> */
    use HasFactory;

    public function label()
    {
        return $this->belongsTo(PhoneLabel::class, 'label_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
