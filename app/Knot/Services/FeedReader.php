<?php namespace Knot\Services;

use GuzzleHttp\Client;
use Illuminate\Cache\Repository;
use Illuminate\Cache\StoreInterface;
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
     * @var Repository
     */
    protected $cache;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param Client $client
     * @param Repository $cache
     */
    public function __construct(Client $client, Repository $cache)
    {
        $this->client = $client;
        $this->clientId = getenv('CLIENT_ID');
        $this->cache = $cache;
    }

    /**
     * Handled by child classes.
     *
     * @throws NoClientIdException
     * @throws NoTagSetException
     * @return array
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