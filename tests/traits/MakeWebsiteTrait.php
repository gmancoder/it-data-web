<?php

use Faker\Factory as Faker;
use App\Models\Website;
use App\Repositories\WebsiteRepository;

trait MakeWebsiteTrait
{
    /**
     * Create fake instance of Website and save it in database
     *
     * @param array $websiteFields
     * @return Website
     */
    public function makeWebsite($websiteFields = [])
    {
        /** @var WebsiteRepository $websiteRepo */
        $websiteRepo = App::make(WebsiteRepository::class);
        $theme = $this->fakeWebsiteData($websiteFields);
        return $websiteRepo->create($theme);
    }

    /**
     * Get fake instance of Website
     *
     * @param array $websiteFields
     * @return Website
     */
    public function fakeWebsite($websiteFields = [])
    {
        return new Website($this->fakeWebsiteData($websiteFields));
    }

    /**
     * Get fake data of Website
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWebsiteData($websiteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'owning_account' => $fake->word,
            'display_in_portal' => $fake->randomElement(['Yes']),
            'category_id' => $fake->randomDigitNotNull,
            'internal_url' => $fake->word,
            'external_url' => $fake->word,
            'admin_url' => $fake->word,
            'admin_username' => $fake->word,
            'admin_password' => $fake->word,
            'status' => $fake->randomElement(['Active', 'Inactive']),
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $websiteFields);
    }
}
