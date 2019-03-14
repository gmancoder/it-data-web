<?php

use Faker\Factory as Faker;
use App\Models\TelevisionShowEpisode;
use App\Repositories\TelevisionShowEpisodeRepository;

trait MakeTelevisionShowEpisodeTrait
{
    /**
     * Create fake instance of TelevisionShowEpisode and save it in database
     *
     * @param array $televisionShowEpisodeFields
     * @return TelevisionShowEpisode
     */
    public function makeTelevisionShowEpisode($televisionShowEpisodeFields = [])
    {
        /** @var TelevisionShowEpisodeRepository $televisionShowEpisodeRepo */
        $televisionShowEpisodeRepo = App::make(TelevisionShowEpisodeRepository::class);
        $theme = $this->fakeTelevisionShowEpisodeData($televisionShowEpisodeFields);
        return $televisionShowEpisodeRepo->create($theme);
    }

    /**
     * Get fake instance of TelevisionShowEpisode
     *
     * @param array $televisionShowEpisodeFields
     * @return TelevisionShowEpisode
     */
    public function fakeTelevisionShowEpisode($televisionShowEpisodeFields = [])
    {
        return new TelevisionShowEpisode($this->fakeTelevisionShowEpisodeData($televisionShowEpisodeFields));
    }

    /**
     * Get fake data of TelevisionShowEpisode
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTelevisionShowEpisodeData($televisionShowEpisodeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'tv_show_id' => $fake->randomDigitNotNull,
            'season_number' => $fake->word,
            'episode_number' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $televisionShowEpisodeFields);
    }
}
