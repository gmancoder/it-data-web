<?php

use App\Models\InboundPackage;
use App\Repositories\InboundPackageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InboundPackageRepositoryTest extends TestCase
{
    use MakeInboundPackageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InboundPackageRepository
     */
    protected $inboundPackageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inboundPackageRepo = App::make(InboundPackageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInboundPackage()
    {
        $inboundPackage = $this->fakeInboundPackageData();
        $createdInboundPackage = $this->inboundPackageRepo->create($inboundPackage);
        $createdInboundPackage = $createdInboundPackage->toArray();
        $this->assertArrayHasKey('id', $createdInboundPackage);
        $this->assertNotNull($createdInboundPackage['id'], 'Created InboundPackage must have id specified');
        $this->assertNotNull(InboundPackage::find($createdInboundPackage['id']), 'InboundPackage with given id must be in DB');
        $this->assertModelData($inboundPackage, $createdInboundPackage);
    }

    /**
     * @test read
     */
    public function testReadInboundPackage()
    {
        $inboundPackage = $this->makeInboundPackage();
        $dbInboundPackage = $this->inboundPackageRepo->find($inboundPackage->id);
        $dbInboundPackage = $dbInboundPackage->toArray();
        $this->assertModelData($inboundPackage->toArray(), $dbInboundPackage);
    }

    /**
     * @test update
     */
    public function testUpdateInboundPackage()
    {
        $inboundPackage = $this->makeInboundPackage();
        $fakeInboundPackage = $this->fakeInboundPackageData();
        $updatedInboundPackage = $this->inboundPackageRepo->update($fakeInboundPackage, $inboundPackage->id);
        $this->assertModelData($fakeInboundPackage, $updatedInboundPackage->toArray());
        $dbInboundPackage = $this->inboundPackageRepo->find($inboundPackage->id);
        $this->assertModelData($fakeInboundPackage, $dbInboundPackage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInboundPackage()
    {
        $inboundPackage = $this->makeInboundPackage();
        $resp = $this->inboundPackageRepo->delete($inboundPackage->id);
        $this->assertTrue($resp);
        $this->assertNull(InboundPackage::find($inboundPackage->id), 'InboundPackage should not exist in DB');
    }
}
