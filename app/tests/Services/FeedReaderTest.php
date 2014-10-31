<?php

use GuzzleHttp\Client;
use Knot\Services\FeedReader;
use Mockery as M;

class FeedReaderTest extends TestCase {

    /** @test */
    public function it_sets_the_tag_name()
    {
        $feed = new FeedReader( M::mock('GuzzleHttp\Client') );
        $feed->setTag('knot');

        $this->assertTrue($feed->getTag() === 'knot');
    }

    /**
     * @test
     * @expectedException Knot\Exceptions\NoTagSetException
     */
    public function it_throws_an_exception_if_no_tag_is_set()
    {
        $feed = new FeedReader(M::mock('GuzzleHttp\Client'));
        $feed->getFeed();
    }

    /**
     * @test
     * @expectedException Knot\Exceptions\NoClientIdException
     */
    public function it_throws_an_exception_if_no_client_id_set()
    {
        // Remove the CLIENT_ID variable for the sake of testing.
        putenv("CLIENT_ID");
        $feed = new FeedReader(M::mock('GuzzleHttp\Client'));
        $feed->setTag('knot');
        $feed->getFeed();
    }
} 