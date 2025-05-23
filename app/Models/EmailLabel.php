<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Representa uma etiqueta usada para classificar e-mails(Ex: trabalho, familia, amigo, outro.).
 * 
 * @property int $id identificador unico.
 * @property string $name Nome da etiqueta (ex: pessoal, trabalho).
 * @property Collection|Email[] $emails Lista de e-mails com essa etiqueta.
 * @property Carbon $created_at data de criação do registro.
 * @property Carbon $updated_at data de atualização do registro.
 */
class EmailLabel extends Model
{
    /** @use HasFactory<\Database\Factories\EmailLabelFactory> */
    use HasFactory;

     public function emails(): HasMany
    {
        return $this->hasMany(Phone::class, 'label_id');
    }
}
