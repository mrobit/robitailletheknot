<?php namespace Knot\Services;

/**
 * Interface FeedReaderInterface
 *
 * Uses Guzzle\Client;
 *
 * @package Knot\Services
 */
interface FeedReaderInterface {

    /**
     * Handles retrieving the feed.
     *
     * @return
     */
    public function getFeed();

}