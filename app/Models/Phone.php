<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PhoneLabel;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneFactory> */
    use HasFactory;

    public function label(): BelongsTo
    {
        return $this->belongsTo(PhoneLabel::class, 'label_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
