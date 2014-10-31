<?php namespace Knot\Services;

class InstagramFeedReader extends FeedReader {

    /**
     * Gets the feed.
     *
     * @return mixed
     */
    public function getFeed()
    {
        parent::getFeed();

        $response = $this->client->get( $this->recentTagMediaUrl() );

        $data = $response->json();

        return count($data['data']) > 0 ? $data['data'] : [];
    }

    public function recentTagMediaUrl()
    {
        return 'https://api.instagram.com/v1/tags/' . $this->tag . '/media/recent?client_id=' . $this->clientId;
    }
}