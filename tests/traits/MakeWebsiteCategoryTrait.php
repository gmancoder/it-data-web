<?php

use Faker\Factory as Faker;
use App\Models\WebsiteCategory;
use App\Repositories\WebsiteCategoryRepository;

trait MakeWebsiteCategoryTrait
{
    /**
     * Create fake instance of WebsiteCategory and save it in database
     *
     * @param array $websiteCategoryFields
     * @return WebsiteCategory
     */
    public function makeWebsiteCategory($websiteCategoryFields = [])
    {
        /** @var WebsiteCategoryRepository $websiteCategoryRepo */
        $websiteCategoryRepo = App::make(WebsiteCategoryRepository::class);
        $theme = $this->fakeWebsiteCategoryData($websiteCategoryFields);
        return $websiteCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of WebsiteCategory
     *
     * @param array $websiteCategoryFields
     * @return WebsiteCategory
     */
    public function fakeWebsiteCategory($websiteCategoryFields = [])
    {
        return new WebsiteCategory($this->fakeWebsiteCategoryData($websiteCategoryFields));
    }

    /**
     * Get fake data of WebsiteCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWebsiteCategoryData($websiteCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'display_rank' => $fake->randomDigitNotNull,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $websiteCategoryFields);
    }
}
