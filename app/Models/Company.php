<?php

namespace App\Models;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Representa uma empresa associada a um contacto.
 * 
 * @property int $id id da empresa.
 * @property string $name nome da empresa.
 * @property string $role cargo do colaborador na empresa.
 * @property Contact|null $contact contato associado a empresa.
 * @property Carbon|null $created_at data de criação do registro.
 * @property Carbon|null $updated_at data de atualização do registro.
 */
class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }
}