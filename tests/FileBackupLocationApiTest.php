<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileBackupLocationApiTest extends TestCase
{
    use MakeFileBackupLocationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFileBackupLocation()
    {
        $fileBackupLocation = $this->fakeFileBackupLocationData();
        $this->json('POST', '/api/v1/fileBackupLocations', $fileBackupLocation);

        $this->assertApiResponse($fileBackupLocation);
    }

    /**
     * @test
     */
    public function testReadFileBackupLocation()
    {
        $fileBackupLocation = $this->makeFileBackupLocation();
        $this->json('GET', '/api/v1/fileBackupLocations/'.$fileBackupLocation->id);

        $this->assertApiResponse($fileBackupLocation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFileBackupLocation()
    {
        $fileBackupLocation = $this->makeFileBackupLocation();
        $editedFileBackupLocation = $this->fakeFileBackupLocationData();

        $this->json('PUT', '/api/v1/fileBackupLocations/'.$fileBackupLocation->id, $editedFileBackupLocation);

        $this->assertApiResponse($editedFileBackupLocation);
    }

    /**
     * @test
     */
    public function testDeleteFileBackupLocation()
    {
        $fileBackupLocation = $this->makeFileBackupLocation();
        $this->json('DELETE', '/api/v1/fileBackupLocations/'.$fileBackupLocation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/fileBackupLocations/'.$fileBackupLocation->id);

        $this->assertResponseStatus(404);
    }
}
