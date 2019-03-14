<?php

use Faker\Factory as Faker;
use App\Models\InboundPackage;
use App\Repositories\InboundPackageRepository;

trait MakeInboundPackageTrait
{
    /**
     * Create fake instance of InboundPackage and save it in database
     *
     * @param array $inboundPackageFields
     * @return InboundPackage
     */
    public function makeInboundPackage($inboundPackageFields = [])
    {
        /** @var InboundPackageRepository $inboundPackageRepo */
        $inboundPackageRepo = App::make(InboundPackageRepository::class);
        $theme = $this->fakeInboundPackageData($inboundPackageFields);
        return $inboundPackageRepo->create($theme);
    }

    /**
     * Get fake instance of InboundPackage
     *
     * @param array $inboundPackageFields
     * @return InboundPackage
     */
    public function fakeInboundPackage($inboundPackageFields = [])
    {
        return new InboundPackage($this->fakeInboundPackageData($inboundPackageFields));
    }

    /**
     * Get fake data of InboundPackage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInboundPackageData($inboundPackageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'carrier' => $fake->word,
            'tracking_number' => $fake->word,
            'dyn_id' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $inboundPackageFields);
    }
}
