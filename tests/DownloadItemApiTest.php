<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DownloadItemApiTest extends TestCase
{
    use MakeDownloadItemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDownloadItem()
    {
        $downloadItem = $this->fakeDownloadItemData();
        $this->json('POST', '/api/v1/downloadItems', $downloadItem);

        $this->assertApiResponse($downloadItem);
    }

    /**
     * @test
     */
    public function testReadDownloadItem()
    {
        $downloadItem = $this->makeDownloadItem();
        $this->json('GET', '/api/v1/downloadItems/'.$downloadItem->id);

        $this->assertApiResponse($downloadItem->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDownloadItem()
    {
        $downloadItem = $this->makeDownloadItem();
        $editedDownloadItem = $this->fakeDownloadItemData();

        $this->json('PUT', '/api/v1/downloadItems/'.$downloadItem->id, $editedDownloadItem);

        $this->assertApiResponse($editedDownloadItem);
    }

    /**
     * @test
     */
    public function testDeleteDownloadItem()
    {
        $downloadItem = $this->makeDownloadItem();
        $this->json('DELETE', '/api/v1/downloadItems/'.$downloadItem->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/downloadItems/'.$downloadItem->id);

        $this->assertResponseStatus(404);
    }
}
