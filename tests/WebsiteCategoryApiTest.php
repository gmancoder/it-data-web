<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebsiteCategoryApiTest extends TestCase
{
    use MakeWebsiteCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWebsiteCategory()
    {
        $websiteCategory = $this->fakeWebsiteCategoryData();
        $this->json('POST', '/api/v1/websiteCategories', $websiteCategory);

        $this->assertApiResponse($websiteCategory);
    }

    /**
     * @test
     */
    public function testReadWebsiteCategory()
    {
        $websiteCategory = $this->makeWebsiteCategory();
        $this->json('GET', '/api/v1/websiteCategories/'.$websiteCategory->id);

        $this->assertApiResponse($websiteCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWebsiteCategory()
    {
        $websiteCategory = $this->makeWebsiteCategory();
        $editedWebsiteCategory = $this->fakeWebsiteCategoryData();

        $this->json('PUT', '/api/v1/websiteCategories/'.$websiteCategory->id, $editedWebsiteCategory);

        $this->assertApiResponse($editedWebsiteCategory);
    }

    /**
     * @test
     */
    public function testDeleteWebsiteCategory()
    {
        $websiteCategory = $this->makeWebsiteCategory();
        $this->json('DELETE', '/api/v1/websiteCategories/'.$websiteCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/websiteCategories/'.$websiteCategory->id);

        $this->assertResponseStatus(404);
    }
}
