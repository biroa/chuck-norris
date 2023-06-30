<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailingListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mailing_lists')->delete();
        DB::table('mailing_lists')->insert([
            0 => [
                'email' => 'adam.biro@citromail.hu',
                'email_domain_segment' => 'citromail.hu',
                'email_name_segment' => 'adam.biro',
                'is_sent' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            1 => [
                'email' => 'adam.biro@freemail.hu',
                'email_domain_segment' => 'freemail.hu',
                'email_name_segment' => 'adam.biro',
                'is_sent' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            2 => [
                'email' => 'adam.biro@test.hu',
                'email_domain_segment' => 'test.hu',
                'email_name_segment' => 'adam.biro',
                'is_sent' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        /**
         *  Note:: Nullable fields in the table
         * 'the_joke'  => null,
         * 'the_joke_api_status_code'  => null,
         * 'the_joke_api_success'  => null,
         */
    }
}
