<?php

namespace App\Models;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * representa uma empresa associada a um contacto.
 * 
 * @property int $id identificador unico.
 * @property string $name nome da empresa.
 * @property string $role cargo do colaborador na empresa.
 * @property Contact $contact contato associado a empresa.
 * @property Carbon $created_at data de criação do registro.
 * @property Carbon $updated_at data de atualização do registro.
 */
class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }
}