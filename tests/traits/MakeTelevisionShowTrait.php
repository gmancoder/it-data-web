<?php

use Faker\Factory as Faker;
use App\Models\TelevisionShow;
use App\Repositories\TelevisionShowRepository;

trait MakeTelevisionShowTrait
{
    /**
     * Create fake instance of TelevisionShow and save it in database
     *
     * @param array $televisionShowFields
     * @return TelevisionShow
     */
    public function makeTelevisionShow($televisionShowFields = [])
    {
        /** @var TelevisionShowRepository $televisionShowRepo */
        $televisionShowRepo = App::make(TelevisionShowRepository::class);
        $theme = $this->fakeTelevisionShowData($televisionShowFields);
        return $televisionShowRepo->create($theme);
    }

    /**
     * Get fake instance of TelevisionShow
     *
     * @param array $televisionShowFields
     * @return TelevisionShow
     */
    public function fakeTelevisionShow($televisionShowFields = [])
    {
        return new TelevisionShow($this->fakeTelevisionShowData($televisionShowFields));
    }

    /**
     * Get fake data of TelevisionShow
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTelevisionShowData($televisionShowFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'banner_filename' => $fake->word,
            'backup' => $fake->randomElement(['Yes']),
            'backup_location' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $televisionShowFields);
    }
}
