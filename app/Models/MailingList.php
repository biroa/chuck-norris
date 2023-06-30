<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
