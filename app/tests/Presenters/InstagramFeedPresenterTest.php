<?php namespace tests\Presenters;

use Knot\Presenters\InstagramFeedPresenter;
use Mockery as M;

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
                ],
                'comments' => [
                    'count' => 1,
                    'data' => [
                        [
                            'created_time' => time(),
                            'text' => 'Lorem ipsum sit amet',
                            'from' => [
                                'full_name' => 'First Last',
                                'username'  => 'frstlst'
                            ]
                        ]
                    ]
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
                ],
                'comments' => [
                    'count' => 0,
                    'data' => []
                ]
            ]
        ];
    }

    /** @test */
    public function it_formats_the_data_correctly()
    {
        $data = InstagramFeedPresenter::prepare($this->data);
        $data = $data[0];

        $this->assertEquals('http://urlA.com', $data->url);
        $this->assertEquals(123456, $data->created);
        $this->assertEquals('This is the caption', $data->caption);
    }

    /** @test */
    public function it_formats_comments_correctly()
    {
        $data = InstagramFeedPresenter::prepare($this->data);

        $firstImage = $data[0];
        $firstComment = $firstImage->comments[0];

        // Test that the first image has comments.
        $this->assertEquals( count($firstImage->comments), 1 );
        $this->assertEquals( $firstComment['text'], 'Lorem ipsum sit amet' );
        $this->assertEquals( $firstComment['name'], 'First Last' );
        $this->assertEquals( $firstComment['username'], 'frstlst' );
    }

} 