<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MailingList
 *
 * @property int $id
 * @property string $email
 * @property string $email_domain_segment
 * @property string $email_name_segment
 * @property bool $is_sent
 * @property string $the_joke
 * @property int $the_joke_api_status_code
 * @property int $email_forwarding_status
 * @property bool $the_joke_api_success
 * @property bool $email_forwarding_date
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereEmailDomainSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereEmailForwardingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereEmailForwardingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereEmailNameSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereIsSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereTheJoke($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereTheJokeApiStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereTheJokeApiSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MailingList extends Model
{
    protected $fillable = [
        'email',
        'email_domain_segment',
        'email_name_segment',
        'is_sent',
        'the_joke',
        'the_joke_api_status_code',
        'the_joke_api_success',
        'email_forwarding_status',
        'email_forwarding_date',
        'created_at',
        'updated_at',
    ];
}
