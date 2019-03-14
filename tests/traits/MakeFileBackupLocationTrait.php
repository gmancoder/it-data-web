<?php

use Faker\Factory as Faker;
use App\Models\FileBackupLocation;
use App\Repositories\FileBackupLocationRepository;

trait MakeFileBackupLocationTrait
{
    /**
     * Create fake instance of FileBackupLocation and save it in database
     *
     * @param array $fileBackupLocationFields
     * @return FileBackupLocation
     */
    public function makeFileBackupLocation($fileBackupLocationFields = [])
    {
        /** @var FileBackupLocationRepository $fileBackupLocationRepo */
        $fileBackupLocationRepo = App::make(FileBackupLocationRepository::class);
        $theme = $this->fakeFileBackupLocationData($fileBackupLocationFields);
        return $fileBackupLocationRepo->create($theme);
    }

    /**
     * Get fake instance of FileBackupLocation
     *
     * @param array $fileBackupLocationFields
     * @return FileBackupLocation
     */
    public function fakeFileBackupLocation($fileBackupLocationFields = [])
    {
        return new FileBackupLocation($this->fakeFileBackupLocationData($fileBackupLocationFields));
    }

    /**
     * Get fake data of FileBackupLocation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFileBackupLocationData($fileBackupLocationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'datastore_location' => $fake->randomDigitNotNull,
            'path' => $fake->word,
            'exclusions' => $fake->word,
            'full_backup_date' => $fake->randomDigitNotNull,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $fileBackupLocationFields);
    }
}
