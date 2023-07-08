<?php

namespace App\Http\Controllers;

use App\Models\MailingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;

/**
 * MailingListController
 */
class MailingListController extends Controller
{
    /**
     * @description Generate the main index page
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Main');
    }

    /**
     * @description Store the email address in the MailingLists table
     *
     * Note:: This is a mock-up/prototype solution not a final approach.
     * We will need to refactor this later to follow the SOLID PRINCIPLES.
     *
     * @param  Request  $request
     * @return Response
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function store(Request $request): Response
    {
        $randomNumber = (int) $request->get('randomNumber');
        $randomNumber = $randomNumber - 1;
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|',
        ]);

        if ($validator->fails()) {
            Inertia::share('email_validation', 'Failed');

            return Inertia::render('Main');
        }

        // validation succeeded
        [$nameSegment,$domainSegment] = explode('@', $request['email']);
        $mailingList = new MailingList();
        $mailingList->email = $request['email'];
        $mailingList->email_domain_segment = $domainSegment;
        $mailingList->email_name_segment = $nameSegment;
        $joke = getJoke();
        if ($joke->we_have) {
            $mailingList->the_joke = $joke->value;
            $email = sendEmailWithAJoke($request['email'], $joke->value);
            $mailingList->email_forwarding_status = $email->email_forwarding_status;
            if ($email->email_forwarding_status === 200) {
                // Set the date and the is_sent flag if status code is 200
                $mailingList->email_forwarding_date = $email->email_forwarding_date;
                $mailingList->is_sent = true;
            }
        }
        $mailingList->the_joke_api_status_code = $joke->status_code;
        $mailingList->the_joke_api_success = $joke->we_have;

        $mailingList->save();

        if ($randomNumber === 0) {
            Inertia::share('emailListSending', 'we send the emails');
        }

        Inertia::share('email_validation', 'Succeeded');
        Inertia::share('randomNumber', $randomNumber);

        return Inertia::render('Main');
    }
}
