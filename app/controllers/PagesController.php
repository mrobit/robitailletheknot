<?php

use Illuminate\View\Factory as View;
use Knot\Services\FeedReaderInterface;
use Knot\Services\InstagramFeedReader;
use Knot\Presenters\InstagramFeedPresenter;

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
	public function index()
	{
        $feed = $this->feed->setTag('robitailletheknot')->getFeed();

        $feed = InstagramFeedPresenter::prepare($feed);

		return $this->view->make('pages.index', compact('feed'));
	}

    public function registry()
    {
        return $this->view->make('pages.registry');
    }

    /**
     * Get the details page.
     *
     * @return Response
     */
    public function details()
    {
        return $this->view->make('pages.details');
    }

}
