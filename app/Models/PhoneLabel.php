<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Representa uma etiqueta usada para classificar os tipos de telefone(Ex: trabalho, familia, amigo, outro.).
 * 
 * @property int $id identificador unico.
 * @property string $name Nome da etiqueta (ex: pessoal, trabalho).
 * @property Collection|Email[] $phones Lista de telefones com essa etiqueta.
 * @property Carbon $created_at data de criação do registro.
 * @property Carbon $updated_at data de atualização do registro.
 */
class PhoneLabel extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneLabelsFactory> */
    use HasFactory;

    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'label_id');
    }
}
