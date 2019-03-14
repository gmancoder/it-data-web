<?php

use App\Models\DownloadItem;
use App\Repositories\DownloadItemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DownloadItemRepositoryTest extends TestCase
{
    use MakeDownloadItemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DownloadItemRepository
     */
    protected $downloadItemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->downloadItemRepo = App::make(DownloadItemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDownloadItem()
    {
        $downloadItem = $this->fakeDownloadItemData();
        $createdDownloadItem = $this->downloadItemRepo->create($downloadItem);
        $createdDownloadItem = $createdDownloadItem->toArray();
        $this->assertArrayHasKey('id', $createdDownloadItem);
        $this->assertNotNull($createdDownloadItem['id'], 'Created DownloadItem must have id specified');
        $this->assertNotNull(DownloadItem::find($createdDownloadItem['id']), 'DownloadItem with given id must be in DB');
        $this->assertModelData($downloadItem, $createdDownloadItem);
    }

    /**
     * @test read
     */
    public function testReadDownloadItem()
    {
        $downloadItem = $this->makeDownloadItem();
        $dbDownloadItem = $this->downloadItemRepo->find($downloadItem->id);
        $dbDownloadItem = $dbDownloadItem->toArray();
        $this->assertModelData($downloadItem->toArray(), $dbDownloadItem);
    }

    /**
     * @test update
     */
    public function testUpdateDownloadItem()
    {
        $downloadItem = $this->makeDownloadItem();
        $fakeDownloadItem = $this->fakeDownloadItemData();
        $updatedDownloadItem = $this->downloadItemRepo->update($fakeDownloadItem, $downloadItem->id);
        $this->assertModelData($fakeDownloadItem, $updatedDownloadItem->toArray());
        $dbDownloadItem = $this->downloadItemRepo->find($downloadItem->id);
        $this->assertModelData($fakeDownloadItem, $dbDownloadItem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDownloadItem()
    {
        $downloadItem = $this->makeDownloadItem();
        $resp = $this->downloadItemRepo->delete($downloadItem->id);
        $this->assertTrue($resp);
        $this->assertNull(DownloadItem::find($downloadItem->id), 'DownloadItem should not exist in DB');
    }
}
