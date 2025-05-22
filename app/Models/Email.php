<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\EmailLabel;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    /** @use HasFactory<\Database\Factories\EmailFactory> */
    use HasFactory;

    public function label(): BelongsTo
    {
        return $this->belongsTo(EmailLabel::class, 'label_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
