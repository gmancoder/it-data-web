<?php

use Faker\Factory as Faker;
use App\Models\LanguageCategory;
use App\Repositories\LanguageCategoryRepository;

trait MakeLanguageCategoryTrait
{
    /**
     * Create fake instance of LanguageCategory and save it in database
     *
     * @param array $languageCategoryFields
     * @return LanguageCategory
     */
    public function makeLanguageCategory($languageCategoryFields = [])
    {
        /** @var LanguageCategoryRepository $languageCategoryRepo */
        $languageCategoryRepo = App::make(LanguageCategoryRepository::class);
        $theme = $this->fakeLanguageCategoryData($languageCategoryFields);
        return $languageCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of LanguageCategory
     *
     * @param array $languageCategoryFields
     * @return LanguageCategory
     */
    public function fakeLanguageCategory($languageCategoryFields = [])
    {
        return new LanguageCategory($this->fakeLanguageCategoryData($languageCategoryFields));
    }

    /**
     * Get fake data of LanguageCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLanguageCategoryData($languageCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'folder_name' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $languageCategoryFields);
    }
}
