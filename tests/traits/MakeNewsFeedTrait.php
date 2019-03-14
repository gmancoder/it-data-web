<?php

use Faker\Factory as Faker;
use App\Models\NewsFeed;
use App\Repositories\NewsFeedRepository;

trait MakeNewsFeedTrait
{
    /**
     * Create fake instance of NewsFeed and save it in database
     *
     * @param array $newsFeedFields
     * @return NewsFeed
     */
    public function makeNewsFeed($newsFeedFields = [])
    {
        /** @var NewsFeedRepository $newsFeedRepo */
        $newsFeedRepo = App::make(NewsFeedRepository::class);
        $theme = $this->fakeNewsFeedData($newsFeedFields);
        return $newsFeedRepo->create($theme);
    }

    /**
     * Get fake instance of NewsFeed
     *
     * @param array $newsFeedFields
     * @return NewsFeed
     */
    public function fakeNewsFeed($newsFeedFields = [])
    {
        return new NewsFeed($this->fakeNewsFeedData($newsFeedFields));
    }

    /**
     * Get fake data of NewsFeed
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNewsFeedData($newsFeedFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'url' => $fake->word,
            'last_downloaded' => $fake->word,
            'articles_read' => $fake->randomDigitNotNull,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $newsFeedFields);
    }
}
