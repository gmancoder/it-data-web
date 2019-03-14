<?php

use Faker\Factory as Faker;
use App\Models\InboundPackageLog;
use App\Repositories\InboundPackageLogRepository;

trait MakeInboundPackageLogTrait
{
    /**
     * Create fake instance of InboundPackageLog and save it in database
     *
     * @param array $inboundPackageLogFields
     * @return InboundPackageLog
     */
    public function makeInboundPackageLog($inboundPackageLogFields = [])
    {
        /** @var InboundPackageLogRepository $inboundPackageLogRepo */
        $inboundPackageLogRepo = App::make(InboundPackageLogRepository::class);
        $theme = $this->fakeInboundPackageLogData($inboundPackageLogFields);
        return $inboundPackageLogRepo->create($theme);
    }

    /**
     * Get fake instance of InboundPackageLog
     *
     * @param array $inboundPackageLogFields
     * @return InboundPackageLog
     */
    public function fakeInboundPackageLog($inboundPackageLogFields = [])
    {
        return new InboundPackageLog($this->fakeInboundPackageLogData($inboundPackageLogFields));
    }

    /**
     * Get fake data of InboundPackageLog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInboundPackageLogData($inboundPackageLogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'subject' => $fake->word,
            'inbound_package_id' => $fake->randomDigitNotNull,
            'created_in_dyn' => $fake->word,
            'notetext' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $inboundPackageLogFields);
    }
}
