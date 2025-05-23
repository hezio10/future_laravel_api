<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Representa uma etiqueta usada para classificar os contactos(Ex: trabalho, familia, amigo, outro.).
 * 
 * @property int $id identificador unico.
 * @property string $name Nome da etiqueta (ex: pessoal, trabalho).
 *
 * @property Collection|Email[] $contacts Lista de contactos com essa etiqueta.
 */
class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'contact_tags');
    }
}
