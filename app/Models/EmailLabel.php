<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailLabel extends Model
{
    /** @use HasFactory<\Database\Factories\EmailLabelFactory> */
    use HasFactory;

     public function emails(): HasMany
    {
        return $this->hasMany(Phone::class, 'label_id');
    }
}
