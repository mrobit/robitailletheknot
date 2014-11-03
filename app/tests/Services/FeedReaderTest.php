<?php

use GuzzleHttp\Client;
use Knot\Services\FeedReader;
use Mockery as M;

class FeedReaderTest extends TestCase {

    public function __construct()
    {
        $this->feed = new FeedReader( M::mock('GuzzleHttp\Client'), M::mock('Illuminate\Cache\Repository'));
    }

    /** @test */
    public function it_sets_the_tag_name()
    {
        $this->feed->setTag('knot');

        $this->assertTrue($this->feed->getTag() === 'knot');
    }

    /**
     * @test
     * @expectedException Knot\Exceptions\NoTagSetException
     */
    public function it_throws_an_exception_if_no_tag_is_set()
    {
        $this->feed->getFeed();
    }

    /**
     * @test
     * @expectedException Knot\Exceptions\NoClientIdException
     */
    public function it_throws_an_exception_if_no_client_id_set()
    {
        // Remove the CLIENT_ID variable for the sake of testing.
        putenv("CLIENT_ID");
        $this->feed->setTag('knot');
        $this->feed->getFeed();
    }
} 