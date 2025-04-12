<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Phone;

class PhoneLabel extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneLabelsFactory> */
    use HasFactory;

    public function phone()
    {
        return $this->hasMany(Phone::class, 'label_id');
    }
}
