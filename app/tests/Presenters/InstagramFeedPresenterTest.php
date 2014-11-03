<?php namespace tests\Presenters;

use Knot\Presenters\InstagramFeedPresenter;

class InstagramFeedPresenterTest extends \TestCase {

    /**
     * Sets up some dummy data that mimicks the Instagram API's return value.
     */
    public function __construct()
    {
        $this->data = [
            [
                'images' => [
                    'standard_resolution' => ['url' => 'http://urlA.com'],
                    'low_resolution'      => ['url' => 'http://urlB.com']
                ],
                'caption' => [
                    'created_time' => 123456,
                    'text' => 'This is the caption'
                ]
            ],
            [
                'images' => [
                    'standard_resolution' => ['url' => 'http://urlC.com'],
                    'low_resolution'      => ['url' => 'http://urlD.com']
                ],
                'caption' => [
                    'created_time' => 123456,
                    'text'         => 'This be another caption'
                ]
            ]
        ];
    }

    /** @test */
    public function it_formats_the_data_correctly()
    {
        $data = InstagramFeedPresenter::prepare($this->data);

        $this->assertEquals('http://urlA.com', $data[0]->url);
        $this->assertEquals(123456, $data[0]->created);
        $this->assertEquals('This is the caption', $data[0]->caption);
        $this->assertTrue( count($data) === 2);
    }
} 