<?php

use App\Models\FileBackupLocation;
use App\Repositories\FileBackupLocationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileBackupLocationRepositoryTest extends TestCase
{
    use MakeFileBackupLocationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FileBackupLocationRepository
     */
    protected $fileBackupLocationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fileBackupLocationRepo = App::make(FileBackupLocationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFileBackupLocation()
    {
        $fileBackupLocation = $this->fakeFileBackupLocationData();
        $createdFileBackupLocation = $this->fileBackupLocationRepo->create($fileBackupLocation);
        $createdFileBackupLocation = $createdFileBackupLocation->toArray();
        $this->assertArrayHasKey('id', $createdFileBackupLocation);
        $this->assertNotNull($createdFileBackupLocation['id'], 'Created FileBackupLocation must have id specified');
        $this->assertNotNull(FileBackupLocation::find($createdFileBackupLocation['id']), 'FileBackupLocation with given id must be in DB');
        $this->assertModelData($fileBackupLocation, $createdFileBackupLocation);
    }

    /**
     * @test read
     */
    public function testReadFileBackupLocation()
    {
        $fileBackupLocation = $this->makeFileBackupLocation();
        $dbFileBackupLocation = $this->fileBackupLocationRepo->find($fileBackupLocation->id);
        $dbFileBackupLocation = $dbFileBackupLocation->toArray();
        $this->assertModelData($fileBackupLocation->toArray(), $dbFileBackupLocation);
    }

    /**
     * @test update
     */
    public function testUpdateFileBackupLocation()
    {
        $fileBackupLocation = $this->makeFileBackupLocation();
        $fakeFileBackupLocation = $this->fakeFileBackupLocationData();
        $updatedFileBackupLocation = $this->fileBackupLocationRepo->update($fakeFileBackupLocation, $fileBackupLocation->id);
        $this->assertModelData($fakeFileBackupLocation, $updatedFileBackupLocation->toArray());
        $dbFileBackupLocation = $this->fileBackupLocationRepo->find($fileBackupLocation->id);
        $this->assertModelData($fakeFileBackupLocation, $dbFileBackupLocation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFileBackupLocation()
    {
        $fileBackupLocation = $this->makeFileBackupLocation();
        $resp = $this->fileBackupLocationRepo->delete($fileBackupLocation->id);
        $this->assertTrue($resp);
        $this->assertNull(FileBackupLocation::find($fileBackupLocation->id), 'FileBackupLocation should not exist in DB');
    }
}
