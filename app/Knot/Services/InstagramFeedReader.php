<?php namespace Knot\Services;

class InstagramFeedReader extends FeedReader {

    /**
     * Gets the feed.
     *
     * @return array
     */
    public function getFeed()
    {
        parent::getFeed();

        $data = $this->cache->remember( $this->tag, 360, function()
        {
            $response = $this->client->get($this->recentTagMediaUrl());

            $body = $response->getBody();

            $data = $body->read($body->getSize());

            $data = json_decode($data, true);

            return $data['data'];
        });
//
        return $data;
    }

    /**
     * Gets the base URL for the API.
     * @return string
     */
    private function getBaseUrl()
    {
        return 'https://api.instagram.com/v1/tags/';
    }

    /**
     * Gets the url to send to Instagram for the API request.
     *
     * @return string
     */
    public function recentTagMediaUrl()
    {
        return $this->getBaseUrl() .  $this->tag . '/media/recent?client_id=' . $this->clientId;
    }
}