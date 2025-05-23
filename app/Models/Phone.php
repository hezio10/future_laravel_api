<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PhoneLabel;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Representa um número de telefone de um contato.
 *
 * @property int $id Identificador único.
 * @property string $phone Número de telefone (ex: 84 123 4567).
 * @property string $prefix Código do país (ex: +258).
 * @property string|null $flag_link Link da imagem da bandeira do país.
 * @property Contact $contact Contato ao qual o telefone pertence.
 * @property PhoneLabel $label Etiqueta que define o tipo do telefone(ex: pessoal, trabalho).
 */
class Phone extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneFactory> */
    use HasFactory;

    public function label(): BelongsTo
    {
        return $this->belongsTo(PhoneLabel::class, 'label_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
