<?php namespace Knot\Services;

class InstagramFeedReader extends FeedReader {

    /**
     * Gets the feed.
     *
     * @return mixed
     */
    public function getFeed()
    {
        $this->setClientId( getenv('CLIENT_ID') );
    }

}