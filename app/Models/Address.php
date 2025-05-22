<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Representa um endereço associado a um contato.
 *
 * @package App\Models
 *
 * @property int $id identificador único do endereço.
 * @property string $street nome da rua ou avenida.
 * @property string $neighborhood nome do bairro.
 * @property Contact $contact Contato associado ao endereço.
 * @property Carbon|null $created_at data de criação do registro.
 * @property Carbon|null $updated_at data de atualização do registro.
 */
class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }
}
