<?php

use Faker\Factory as Faker;
use App\Models\DownloadItem;
use App\Repositories\DownloadItemRepository;

trait MakeDownloadItemTrait
{
    /**
     * Create fake instance of DownloadItem and save it in database
     *
     * @param array $downloadItemFields
     * @return DownloadItem
     */
    public function makeDownloadItem($downloadItemFields = [])
    {
        /** @var DownloadItemRepository $downloadItemRepo */
        $downloadItemRepo = App::make(DownloadItemRepository::class);
        $theme = $this->fakeDownloadItemData($downloadItemFields);
        return $downloadItemRepo->create($theme);
    }

    /**
     * Get fake instance of DownloadItem
     *
     * @param array $downloadItemFields
     * @return DownloadItem
     */
    public function fakeDownloadItem($downloadItemFields = [])
    {
        return new DownloadItem($this->fakeDownloadItemData($downloadItemFields));
    }

    /**
     * Get fake data of DownloadItem
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDownloadItemData($downloadItemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'keyword' => $fake->word,
            'work_path' => $fake->word,
            'exclusions' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $downloadItemFields);
    }
}
