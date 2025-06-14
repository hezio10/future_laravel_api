<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * representa um endereço associado a um contato.s
 *
 * @property int $id identificador único.
 * @property string $street nome da rua ou avenida.
 * @property string $neighborhood nome do bairro.
 * @property Contact $contact contato associado ao endereço.
 * @property Carbon $created_at data de criação do registro.
 * @property Carbon $updated_at data de atualização do registro.
 */
class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    protected $fillable = [
        'street',
        'neighborhood',
    ];

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }
}
