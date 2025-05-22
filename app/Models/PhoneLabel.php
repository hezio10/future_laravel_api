<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhoneLabel extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneLabelsFactory> */
    use HasFactory;

    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'label_id');
    }
}
