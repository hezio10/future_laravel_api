<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\EmailLabel;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * representa um endereço de e-mail de um contato.
 *
 * @property int $id identificador unico.
 * @property string $email endereço de e-mail(ex: exemplo@email.com, test@email.com).
 * @property Contact $contact contato no qual um email pertence.
 * @property EmailLabel $label etiqueta para classificar o tipo do e-mail(ex: pessoal, trabalho).
 */
class Email extends Model
{
    /** @use HasFactory<\Database\Factories\EmailFactory> */
    use HasFactory;

    public function label(): BelongsTo
    {
        return $this->belongsTo(EmailLabel::class, 'label_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
