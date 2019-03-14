<?php

use Faker\Factory as Faker;
use App\Models\LastRun;
use App\Repositories\LastRunRepository;

trait MakeLastRunTrait
{
    /**
     * Create fake instance of LastRun and save it in database
     *
     * @param array $lastRunFields
     * @return LastRun
     */
    public function makeLastRun($lastRunFields = [])
    {
        /** @var LastRunRepository $lastRunRepo */
        $lastRunRepo = App::make(LastRunRepository::class);
        $theme = $this->fakeLastRunData($lastRunFields);
        return $lastRunRepo->create($theme);
    }

    /**
     * Get fake instance of LastRun
     *
     * @param array $lastRunFields
     * @return LastRun
     */
    public function fakeLastRun($lastRunFields = [])
    {
        return new LastRun($this->fakeLastRunData($lastRunFields));
    }

    /**
     * Get fake data of LastRun
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLastRunData($lastRunFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tool_name' => $fake->word,
            'tool_alias' => $fake->word,
            'last_run_date' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $lastRunFields);
    }
}
