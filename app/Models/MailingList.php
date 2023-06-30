<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $email
 * @property string $email_domain_segment
 * @property string $email_name_segment
 * @property bool $is_sent
 * @property string $created_at
 * @property string $updated_at
 */
class MailingList extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'email_domain_segment',
        'email_name_segment',
        'is_sent',
        'the_joke',
        'the_joke_api_status_code',
        'the_joke_api_success',
        'created_at',
        'updated_at',
    ];
}
