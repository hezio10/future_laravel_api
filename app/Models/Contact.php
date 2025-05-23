<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * representa um contato na lista telefônica de um usuário.
 *
 * @property int $id identificador unico do contato.
 * @property string $name nome.
 * @property string|null $notes algumas anotações ou comentarios.
 * @property string|null $birthdate data de nascimento.
 * @property string|null $image url da imagem(foto ou avatar).
 * @property Address|null $address endereço relacionado a um contacto.
 * @property Company|null $company empresa na qual um contacto trabalha.
 * @property Collection|Phone[] $phones lista dos numeros de telefone de um contacto(ex: +258 85..., +21 58...).
 * @property Collection|Email[] $emails lista de e-mails de um contato.
 * @property Collection|Tag[] $tags lista de etiquetas para classificar um contato(ex: amigo, família, colega).
 * @property Carbon|null $created_at data de criação do registro.
 * @property Carbon|null $updated_at data de atualização do registro.
 */
class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function phones(): HasMany
    {
        return $this->HasMany(Phone::class);
    }

    public function emails(): HasMany
    {
        return $this->HasMany(Email::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'contact_tags');
    }
} 
