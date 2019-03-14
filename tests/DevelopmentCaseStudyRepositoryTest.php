<?php

use App\Models\DevelopmentCaseStudy;
use App\Repositories\DevelopmentCaseStudyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DevelopmentCaseStudyRepositoryTest extends TestCase
{
    use MakeDevelopmentCaseStudyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DevelopmentCaseStudyRepository
     */
    protected $developmentCaseStudyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->developmentCaseStudyRepo = App::make(DevelopmentCaseStudyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->fakeDevelopmentCaseStudyData();
        $createdDevelopmentCaseStudy = $this->developmentCaseStudyRepo->create($developmentCaseStudy);
        $createdDevelopmentCaseStudy = $createdDevelopmentCaseStudy->toArray();
        $this->assertArrayHasKey('id', $createdDevelopmentCaseStudy);
        $this->assertNotNull($createdDevelopmentCaseStudy['id'], 'Created DevelopmentCaseStudy must have id specified');
        $this->assertNotNull(DevelopmentCaseStudy::find($createdDevelopmentCaseStudy['id']), 'DevelopmentCaseStudy with given id must be in DB');
        $this->assertModelData($developmentCaseStudy, $createdDevelopmentCaseStudy);
    }

    /**
     * @test read
     */
    public function testReadDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->makeDevelopmentCaseStudy();
        $dbDevelopmentCaseStudy = $this->developmentCaseStudyRepo->find($developmentCaseStudy->id);
        $dbDevelopmentCaseStudy = $dbDevelopmentCaseStudy->toArray();
        $this->assertModelData($developmentCaseStudy->toArray(), $dbDevelopmentCaseStudy);
    }

    /**
     * @test update
     */
    public function testUpdateDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->makeDevelopmentCaseStudy();
        $fakeDevelopmentCaseStudy = $this->fakeDevelopmentCaseStudyData();
        $updatedDevelopmentCaseStudy = $this->developmentCaseStudyRepo->update($fakeDevelopmentCaseStudy, $developmentCaseStudy->id);
        $this->assertModelData($fakeDevelopmentCaseStudy, $updatedDevelopmentCaseStudy->toArray());
        $dbDevelopmentCaseStudy = $this->developmentCaseStudyRepo->find($developmentCaseStudy->id);
        $this->assertModelData($fakeDevelopmentCaseStudy, $dbDevelopmentCaseStudy->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->makeDevelopmentCaseStudy();
        $resp = $this->developmentCaseStudyRepo->delete($developmentCaseStudy->id);
        $this->assertTrue($resp);
        $this->assertNull(DevelopmentCaseStudy::find($developmentCaseStudy->id), 'DevelopmentCaseStudy should not exist in DB');
    }
}
