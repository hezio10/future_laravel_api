<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\EmailLabel;
use App\Models\Contact;

class Email extends Model
{
    /** @use HasFactory<\Database\Factories\EmailFactory> */
    use HasFactory;

    public function label()
    {
        return $this->belongsTo(EmailLabel::class, 'label_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
