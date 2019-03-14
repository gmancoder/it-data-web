<?php

use App\Models\TelevisionShow;
use App\Repositories\TelevisionShowRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TelevisionShowRepositoryTest extends TestCase
{
    use MakeTelevisionShowTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TelevisionShowRepository
     */
    protected $televisionShowRepo;

    public function setUp()
    {
        parent::setUp();
        $this->televisionShowRepo = App::make(TelevisionShowRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTelevisionShow()
    {
        $televisionShow = $this->fakeTelevisionShowData();
        $createdTelevisionShow = $this->televisionShowRepo->create($televisionShow);
        $createdTelevisionShow = $createdTelevisionShow->toArray();
        $this->assertArrayHasKey('id', $createdTelevisionShow);
        $this->assertNotNull($createdTelevisionShow['id'], 'Created TelevisionShow must have id specified');
        $this->assertNotNull(TelevisionShow::find($createdTelevisionShow['id']), 'TelevisionShow with given id must be in DB');
        $this->assertModelData($televisionShow, $createdTelevisionShow);
    }

    /**
     * @test read
     */
    public function testReadTelevisionShow()
    {
        $televisionShow = $this->makeTelevisionShow();
        $dbTelevisionShow = $this->televisionShowRepo->find($televisionShow->id);
        $dbTelevisionShow = $dbTelevisionShow->toArray();
        $this->assertModelData($televisionShow->toArray(), $dbTelevisionShow);
    }

    /**
     * @test update
     */
    public function testUpdateTelevisionShow()
    {
        $televisionShow = $this->makeTelevisionShow();
        $fakeTelevisionShow = $this->fakeTelevisionShowData();
        $updatedTelevisionShow = $this->televisionShowRepo->update($fakeTelevisionShow, $televisionShow->id);
        $this->assertModelData($fakeTelevisionShow, $updatedTelevisionShow->toArray());
        $dbTelevisionShow = $this->televisionShowRepo->find($televisionShow->id);
        $this->assertModelData($fakeTelevisionShow, $dbTelevisionShow->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTelevisionShow()
    {
        $televisionShow = $this->makeTelevisionShow();
        $resp = $this->televisionShowRepo->delete($televisionShow->id);
        $this->assertTrue($resp);
        $this->assertNull(TelevisionShow::find($televisionShow->id), 'TelevisionShow should not exist in DB');
    }
}
