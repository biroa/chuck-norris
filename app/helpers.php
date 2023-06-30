<?php

    use Illuminate\Support\Facades\Http;

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
