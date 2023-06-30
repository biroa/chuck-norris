<?php
    use Illuminate\Support\Facades;
    use Illuminate\Support\Facades\Http;

if (!function_exists('getJoke')) {

    /**
     *  @Note: In a final / production version, this should be in a service file.
     *  @description Get a Chuck Norris Joke
     *  @return object
     */
    function getJoke(): object
    {
        $theJoke = [];
        $response = Http::get(env('CHUCK_NORRIS_API'));
        if($response->successful()){
            $jokeObj = $response->object();
            $theJoke['joke'] = $jokeObj->value;
            $theJoke['the_joke_api_status_code'] = $response->status();
            $theJoke['the_joke_api_success'] = $response->successful();
        }
        if($response->failed()){
            $theJoke['the_joke_api_status_code'] = $response->status();
            $theJoke['the_joke_api_success'] = $response->failed();
        }

        return (object)$theJoke;
    }

}
