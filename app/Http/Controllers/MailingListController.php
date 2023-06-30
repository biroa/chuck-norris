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
     * @description Store the email address in the MailingLists table
     *
     * Note:: This is a mock-up/prototype solution not a final approach.
     * We will need to refactor this later to follow the SOLID PRINCIPLES.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request): Response
    {
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
        }
        $mailingList->the_joke_api_status_code = $joke->status_code;
        $mailingList->the_joke_api_success = $joke->we_have;

        $mailingList->save();

        Inertia::share('email_validation', 'Succeeded');

        return Inertia::render('Main');
}
}
