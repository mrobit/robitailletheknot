<?php namespace Knot\Services;

use GuzzleHttp\Client;

class FeedReader implements FeedReaderInterface {

    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Handled by child classes.
     */
    public function getFeed() {}

    /**
     * Sets the client ID for the feed reader.
     *
     * @return void
     */
    private function setClientId()
    {
        $this->clientId = getenv('CLIENT_ID');
    }
}