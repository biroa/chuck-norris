<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * MailingListController
 */
class MailingListController extends Controller
{
    /**
     * @description Store the email address in the MailingLists table
     *
     * @param  Request  $request
     * @return void
     */
    public function store(Request $request){
        dd($request->all());
    }
}
