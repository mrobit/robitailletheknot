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

        // Return the cached value if it exists. If not, we'll set it using the Closure
        // on the "remember" method.
        $data = $this->cache->remember( $this->tag, 360, function()
        {
            $response = $this->client->get( $this->recentTagMediaUrl() );

            $data = $response->json();

            return $data['data'];
        });

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