<?php

use Knot\Services\InstagramFeedReader;
use Mockery as M;

class InstagramFeedReaderTest extends \TestCase {

    public function __construct()
    {
        // Set a dummy client ID.
        putenv('CLIENT_ID=123456');
        $this->feed = new InstagramFeedReader( M::mock('GuzzleHttp\Client'), M::mock('Illuminate\Cache\Repository'));
    }

    /**
     * Check whether the formatted URL returns the proper format.
     *
     * @test
     */
    public function it_returns_a_correctly_formatted_url()
    {
        $this->feed->setTag('knot');

        $this->assertEquals(
            'https://api.instagram.com/v1/tags/knot/media/recent?client_id=123456',
            $this->feed->recentTagMediaUrl()
        );
    }

}