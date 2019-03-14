<?php

namespace App\Http\Controllers;

use App\DataTables\NewsFeedDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNewsFeedRequest;
use App\Http\Requests\UpdateNewsFeedRequest;
use App\Repositories\NewsFeedRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NewsFeedController extends AppBaseController
{
    /** @var  NewsFeedRepository */
    private $newsFeedRepository;

    public function __construct(NewsFeedRepository $newsFeedRepo)
    {
        $this->newsFeedRepository = $newsFeedRepo;
    }

    /**
     * Display a listing of the NewsFeed.
     *
     * @param NewsFeedDataTable $newsFeedDataTable
     * @return Response
     */
    public function index(NewsFeedDataTable $newsFeedDataTable)
    {
        return $newsFeedDataTable->render('news_feeds.index');
    }

    /**
     * Show the form for creating a new NewsFeed.
     *
     * @return Response
     */
    public function create()
    {
        return view('news_feeds.create');
    }

    /**
     * Store a newly created NewsFeed in storage.
     *
     * @param CreateNewsFeedRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsFeedRequest $request)
    {
        $input = $request->all();

        $newsFeed = $this->newsFeedRepository->create($input);

        Flash::success('News Feed saved successfully.');

        return redirect(route('newsFeeds.index'));
    }

    /**
     * Display the specified NewsFeed.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            Flash::error('News Feed not found');

            return redirect(route('newsFeeds.index'));
        }

        return view('news_feeds.show')->with('newsFeed', $newsFeed);
    }

    /**
     * Show the form for editing the specified NewsFeed.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            Flash::error('News Feed not found');

            return redirect(route('newsFeeds.index'));
        }

        return view('news_feeds.edit')->with('newsFeed', $newsFeed);
    }

    /**
     * Update the specified NewsFeed in storage.
     *
     * @param  int              $id
     * @param UpdateNewsFeedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsFeedRequest $request)
    {
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            Flash::error('News Feed not found');

            return redirect(route('newsFeeds.index'));
        }

        $newsFeed = $this->newsFeedRepository->update($request->all(), $id);

        Flash::success('News Feed updated successfully.');

        return redirect(route('newsFeeds.index'));
    }

    /**
     * Remove the specified NewsFeed from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            Flash::error('News Feed not found');

            return redirect(route('newsFeeds.index'));
        }

        $this->newsFeedRepository->delete($id);

        Flash::success('News Feed deleted successfully.');

        return redirect(route('newsFeeds.index'));
    }
}
