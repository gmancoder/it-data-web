<?php

use App\Models\InboundPackageLog;
use App\Repositories\InboundPackageLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InboundPackageLogRepositoryTest extends TestCase
{
    use MakeInboundPackageLogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InboundPackageLogRepository
     */
    protected $inboundPackageLogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inboundPackageLogRepo = App::make(InboundPackageLogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInboundPackageLog()
    {
        $inboundPackageLog = $this->fakeInboundPackageLogData();
        $createdInboundPackageLog = $this->inboundPackageLogRepo->create($inboundPackageLog);
        $createdInboundPackageLog = $createdInboundPackageLog->toArray();
        $this->assertArrayHasKey('id', $createdInboundPackageLog);
        $this->assertNotNull($createdInboundPackageLog['id'], 'Created InboundPackageLog must have id specified');
        $this->assertNotNull(InboundPackageLog::find($createdInboundPackageLog['id']), 'InboundPackageLog with given id must be in DB');
        $this->assertModelData($inboundPackageLog, $createdInboundPackageLog);
    }

    /**
     * @test read
     */
    public function testReadInboundPackageLog()
    {
        $inboundPackageLog = $this->makeInboundPackageLog();
        $dbInboundPackageLog = $this->inboundPackageLogRepo->find($inboundPackageLog->id);
        $dbInboundPackageLog = $dbInboundPackageLog->toArray();
        $this->assertModelData($inboundPackageLog->toArray(), $dbInboundPackageLog);
    }

    /**
     * @test update
     */
    public function testUpdateInboundPackageLog()
    {
        $inboundPackageLog = $this->makeInboundPackageLog();
        $fakeInboundPackageLog = $this->fakeInboundPackageLogData();
        $updatedInboundPackageLog = $this->inboundPackageLogRepo->update($fakeInboundPackageLog, $inboundPackageLog->id);
        $this->assertModelData($fakeInboundPackageLog, $updatedInboundPackageLog->toArray());
        $dbInboundPackageLog = $this->inboundPackageLogRepo->find($inboundPackageLog->id);
        $this->assertModelData($fakeInboundPackageLog, $dbInboundPackageLog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInboundPackageLog()
    {
        $inboundPackageLog = $this->makeInboundPackageLog();
        $resp = $this->inboundPackageLogRepo->delete($inboundPackageLog->id);
        $this->assertTrue($resp);
        $this->assertNull(InboundPackageLog::find($inboundPackageLog->id), 'InboundPackageLog should not exist in DB');
    }
}
