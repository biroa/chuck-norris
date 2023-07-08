<?php

use App\Models\MailingList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Log;
    use Mailgun\Mailgun;
use Psr\Http\Client\ClientExceptionInterface as ClientExceptionInterfaceAlias;

if (! function_exists('getJoke')) {

    /**
     *  @Note: In a final / production version, this should be in a service file.
     *  @description Get a Chuck Norris Joke
     *
     *  @return object
     */
    function getJoke(): object
    {
        $theJoke = [];
        $response = Http::get(env('CHUCK_NORRIS_API'));
        if ($response->successful()) {
            $jokeObj = $response->object();
            $theJoke['value'] = $jokeObj->value;
            $theJoke['status_code'] = $response->status();
            $theJoke['we_have'] = $response->successful();
        }
        if ($response->failed()) {
            $theJoke['status_code'] = $response->status();
            $theJoke['we_have'] = $response->failed();
        }

        return (object) $theJoke;
    }
}

if (! function_exists('getTheLastGroupOfEmailAddress')) {
    /**
     * @return array
     */
    function getTheLastGroupOfEmailAddress(): array
    {
        $mailingList = new MailingList();
        $records = $mailingList
            ->where('is_sent', false)
            ->where('email_forwarding_status', null)
            ->get();

        return $records->pluck('email')->toArray();
    }
}

if (! function_exists('sendEmailWithAJoke')) {
    /**
     * @description Send a ChuckNorris Joke through the mailGunApi.
     * Return mailgun status_code and data as an object to store in the DB.
     *
     * @param  string  $email
     * @param  string  $joke
     * @return object
     *
     * @throws ClientExceptionInterfaceAlias
     */
    function sendEmailWithAJoke(string $email, string $joke): object
    {
        $emailStatus = [];
        //$from = implode(['\'Excited User <mailgun@',env('MAIL_FROM'),'.mailgun.org>\'']);

        // First, instantiate the SDK with your API credentials
        $mg = Mailgun::create(env('API_KEY'), 'https://api.mailgun.net/v3');
        // Compose the massage
        $mg->messages()->send(env('MAIL_DOMAIN'), [
            'from' => 'Excited User <mailgun@'.env('MAIL_FROM').'.mailgun.org>',
            'to' => $email,
            'subject' => 'Chuck Norris Joke',
            'text' => $joke,
        ]);
        if ($mg->getLastResponse()->getStatusCode() === 200) {
            Log::info('Successful mailgun forwarding');
        } else {
            Log::info('Failed mailgun forwarding');
        }
        $emailStatus['email_forwarding_status'] = $mg->getLastResponse()->getStatusCode();
        $forwardingDate = $mg->getLastResponse()->getHeader('date');
        $emailStatus['email_forwarding_date'] = Carbon::parse(array_shift($forwardingDate))
                                                      ->format('Y-m-d H:i:s');

        return (object) $emailStatus;
    }
}
