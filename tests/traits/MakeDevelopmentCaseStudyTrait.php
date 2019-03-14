<?php

use Faker\Factory as Faker;
use App\Models\DevelopmentCaseStudy;
use App\Repositories\DevelopmentCaseStudyRepository;

trait MakeDevelopmentCaseStudyTrait
{
    /**
     * Create fake instance of DevelopmentCaseStudy and save it in database
     *
     * @param array $developmentCaseStudyFields
     * @return DevelopmentCaseStudy
     */
    public function makeDevelopmentCaseStudy($developmentCaseStudyFields = [])
    {
        /** @var DevelopmentCaseStudyRepository $developmentCaseStudyRepo */
        $developmentCaseStudyRepo = App::make(DevelopmentCaseStudyRepository::class);
        $theme = $this->fakeDevelopmentCaseStudyData($developmentCaseStudyFields);
        return $developmentCaseStudyRepo->create($theme);
    }

    /**
     * Get fake instance of DevelopmentCaseStudy
     *
     * @param array $developmentCaseStudyFields
     * @return DevelopmentCaseStudy
     */
    public function fakeDevelopmentCaseStudy($developmentCaseStudyFields = [])
    {
        return new DevelopmentCaseStudy($this->fakeDevelopmentCaseStudyData($developmentCaseStudyFields));
    }

    /**
     * Get fake data of DevelopmentCaseStudy
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDevelopmentCaseStudyData($developmentCaseStudyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'developed_for' => $fake->word,
            'year' => $fake->randomDigitNotNull,
            'developed_language' => $fake->randomElement(['C#', 'PHP', 'Python', 'Ruby', 'Java', 'Node.JS']),
            'database_platform' => $fake->randomElement(['MongoDB', 'MySQl', 'Oracle', 'PostgreSQL', 'SQLServer']),
            'lanugage_category_id' => $fake->randomDigitNotNull,
            'summary' => $fake->word,
            'display_order' => $fake->randomDigitNotNull,
            'private' => $fake->randomElement(['Yes']),
            'github_repo_url' => $fake->word,
            'thumbnail_url' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $developmentCaseStudyFields);
    }
}
