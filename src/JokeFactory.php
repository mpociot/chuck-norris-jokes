<?php

namespace Mpociot\ChuckNorrisJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandomJoke()
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $joke = json_decode($response->getBody()->getContents());

        return $joke->value->joke;
    }
}
