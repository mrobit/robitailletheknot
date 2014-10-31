<?php

use Illuminate\View\Factory as View;
use Knot\Services\FeedReaderInterface;
use Knot\Services\InstagramFeedReader;

class PagesController extends \BaseController {

    /**
     * @var View
     */
    private $view;

    /**
     * @var InstagramFeedReader
     */
    private $feed;

    /**
     * @param View $view
     * @param InstagramFeedReader $feed
     */
    public function __construct(View $view, InstagramFeedReader $feed)
    {
        $this->view = $view;
        $this->feed = $feed;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $feed = $this->feed->setTag('robitailletheknot')->getFeed();

		return $this->view->make('pages.index', compact('feed'));
	}


}
