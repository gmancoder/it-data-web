<?php

use App\Models\LastRun;
use App\Repositories\LastRunRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LastRunRepositoryTest extends TestCase
{
    use MakeLastRunTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LastRunRepository
     */
    protected $lastRunRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lastRunRepo = App::make(LastRunRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLastRun()
    {
        $lastRun = $this->fakeLastRunData();
        $createdLastRun = $this->lastRunRepo->create($lastRun);
        $createdLastRun = $createdLastRun->toArray();
        $this->assertArrayHasKey('id', $createdLastRun);
        $this->assertNotNull($createdLastRun['id'], 'Created LastRun must have id specified');
        $this->assertNotNull(LastRun::find($createdLastRun['id']), 'LastRun with given id must be in DB');
        $this->assertModelData($lastRun, $createdLastRun);
    }

    /**
     * @test read
     */
    public function testReadLastRun()
    {
        $lastRun = $this->makeLastRun();
        $dbLastRun = $this->lastRunRepo->find($lastRun->id);
        $dbLastRun = $dbLastRun->toArray();
        $this->assertModelData($lastRun->toArray(), $dbLastRun);
    }

    /**
     * @test update
     */
    public function testUpdateLastRun()
    {
        $lastRun = $this->makeLastRun();
        $fakeLastRun = $this->fakeLastRunData();
        $updatedLastRun = $this->lastRunRepo->update($fakeLastRun, $lastRun->id);
        $this->assertModelData($fakeLastRun, $updatedLastRun->toArray());
        $dbLastRun = $this->lastRunRepo->find($lastRun->id);
        $this->assertModelData($fakeLastRun, $dbLastRun->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLastRun()
    {
        $lastRun = $this->makeLastRun();
        $resp = $this->lastRunRepo->delete($lastRun->id);
        $this->assertTrue($resp);
        $this->assertNull(LastRun::find($lastRun->id), 'LastRun should not exist in DB');
    }
}
