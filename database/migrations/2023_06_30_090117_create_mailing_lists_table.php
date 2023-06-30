<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('email_domain_segment', 150);
            $table->string('email_name_segment', 200);
            // flag to detect which email was sent out already
            $table->boolean('is_sent')->default(false);
            // If the following fields are empty the Joe API is not called yet
            $table->text('the_joke')->default(null)->nullable();
            $table->smallInteger('the_joke_api_status_code')->default(null)->nullable();
            $table->boolean('the_joke_api_success')->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailing_lists');
    }
}
