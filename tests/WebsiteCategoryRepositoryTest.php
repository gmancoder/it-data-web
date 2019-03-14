<?php

use App\Models\WebsiteCategory;
use App\Repositories\WebsiteCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebsiteCategoryRepositoryTest extends TestCase
{
    use MakeWebsiteCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WebsiteCategoryRepository
     */
    protected $websiteCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->websiteCategoryRepo = App::make(WebsiteCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWebsiteCategory()
    {
        $websiteCategory = $this->fakeWebsiteCategoryData();
        $createdWebsiteCategory = $this->websiteCategoryRepo->create($websiteCategory);
        $createdWebsiteCategory = $createdWebsiteCategory->toArray();
        $this->assertArrayHasKey('id', $createdWebsiteCategory);
        $this->assertNotNull($createdWebsiteCategory['id'], 'Created WebsiteCategory must have id specified');
        $this->assertNotNull(WebsiteCategory::find($createdWebsiteCategory['id']), 'WebsiteCategory with given id must be in DB');
        $this->assertModelData($websiteCategory, $createdWebsiteCategory);
    }

    /**
     * @test read
     */
    public function testReadWebsiteCategory()
    {
        $websiteCategory = $this->makeWebsiteCategory();
        $dbWebsiteCategory = $this->websiteCategoryRepo->find($websiteCategory->id);
        $dbWebsiteCategory = $dbWebsiteCategory->toArray();
        $this->assertModelData($websiteCategory->toArray(), $dbWebsiteCategory);
    }

    /**
     * @test update
     */
    public function testUpdateWebsiteCategory()
    {
        $websiteCategory = $this->makeWebsiteCategory();
        $fakeWebsiteCategory = $this->fakeWebsiteCategoryData();
        $updatedWebsiteCategory = $this->websiteCategoryRepo->update($fakeWebsiteCategory, $websiteCategory->id);
        $this->assertModelData($fakeWebsiteCategory, $updatedWebsiteCategory->toArray());
        $dbWebsiteCategory = $this->websiteCategoryRepo->find($websiteCategory->id);
        $this->assertModelData($fakeWebsiteCategory, $dbWebsiteCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWebsiteCategory()
    {
        $websiteCategory = $this->makeWebsiteCategory();
        $resp = $this->websiteCategoryRepo->delete($websiteCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(WebsiteCategory::find($websiteCategory->id), 'WebsiteCategory should not exist in DB');
    }
}
