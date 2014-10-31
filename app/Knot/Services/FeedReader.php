<?php namespace Knot\Services;

use GuzzleHttp\Client;
use Knot\Exceptions\NoClientIdException;
use Knot\Exceptions\NoTagSetException;

class FeedReader implements FeedReaderInterface {

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var $tag string
     */
    protected $tag;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->clientId = getenv('CLIENT_ID');
    }

    /**
     * Handled by child classes.
     */
    public function getFeed()
    {
        if ( empty($this->tag) )
        {
            throw new NoTagSetException;
        }

        if ( empty($this->clientId))
        {
            throw new NoClientIdException;
        }
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        if ( is_string($tag) && ! empty($tag))
        {
            $this->tag = $tag;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

}