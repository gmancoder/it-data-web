<?php

use App\Models\TelevisionShowEpisode;
use App\Repositories\TelevisionShowEpisodeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TelevisionShowEpisodeRepositoryTest extends TestCase
{
    use MakeTelevisionShowEpisodeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TelevisionShowEpisodeRepository
     */
    protected $televisionShowEpisodeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->televisionShowEpisodeRepo = App::make(TelevisionShowEpisodeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->fakeTelevisionShowEpisodeData();
        $createdTelevisionShowEpisode = $this->televisionShowEpisodeRepo->create($televisionShowEpisode);
        $createdTelevisionShowEpisode = $createdTelevisionShowEpisode->toArray();
        $this->assertArrayHasKey('id', $createdTelevisionShowEpisode);
        $this->assertNotNull($createdTelevisionShowEpisode['id'], 'Created TelevisionShowEpisode must have id specified');
        $this->assertNotNull(TelevisionShowEpisode::find($createdTelevisionShowEpisode['id']), 'TelevisionShowEpisode with given id must be in DB');
        $this->assertModelData($televisionShowEpisode, $createdTelevisionShowEpisode);
    }

    /**
     * @test read
     */
    public function testReadTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->makeTelevisionShowEpisode();
        $dbTelevisionShowEpisode = $this->televisionShowEpisodeRepo->find($televisionShowEpisode->id);
        $dbTelevisionShowEpisode = $dbTelevisionShowEpisode->toArray();
        $this->assertModelData($televisionShowEpisode->toArray(), $dbTelevisionShowEpisode);
    }

    /**
     * @test update
     */
    public function testUpdateTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->makeTelevisionShowEpisode();
        $fakeTelevisionShowEpisode = $this->fakeTelevisionShowEpisodeData();
        $updatedTelevisionShowEpisode = $this->televisionShowEpisodeRepo->update($fakeTelevisionShowEpisode, $televisionShowEpisode->id);
        $this->assertModelData($fakeTelevisionShowEpisode, $updatedTelevisionShowEpisode->toArray());
        $dbTelevisionShowEpisode = $this->televisionShowEpisodeRepo->find($televisionShowEpisode->id);
        $this->assertModelData($fakeTelevisionShowEpisode, $dbTelevisionShowEpisode->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->makeTelevisionShowEpisode();
        $resp = $this->televisionShowEpisodeRepo->delete($televisionShowEpisode->id);
        $this->assertTrue($resp);
        $this->assertNull(TelevisionShowEpisode::find($televisionShowEpisode->id), 'TelevisionShowEpisode should not exist in DB');
    }
}
