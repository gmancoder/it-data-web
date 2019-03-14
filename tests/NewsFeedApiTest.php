<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsFeedApiTest extends TestCase
{
    use MakeNewsFeedTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNewsFeed()
    {
        $newsFeed = $this->fakeNewsFeedData();
        $this->json('POST', '/api/v1/newsFeeds', $newsFeed);

        $this->assertApiResponse($newsFeed);
    }

    /**
     * @test
     */
    public function testReadNewsFeed()
    {
        $newsFeed = $this->makeNewsFeed();
        $this->json('GET', '/api/v1/newsFeeds/'.$newsFeed->id);

        $this->assertApiResponse($newsFeed->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNewsFeed()
    {
        $newsFeed = $this->makeNewsFeed();
        $editedNewsFeed = $this->fakeNewsFeedData();

        $this->json('PUT', '/api/v1/newsFeeds/'.$newsFeed->id, $editedNewsFeed);

        $this->assertApiResponse($editedNewsFeed);
    }

    /**
     * @test
     */
    public function testDeleteNewsFeed()
    {
        $newsFeed = $this->makeNewsFeed();
        $this->json('DELETE', '/api/v1/newsFeeds/'.$newsFeed->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/newsFeeds/'.$newsFeed->id);

        $this->assertResponseStatus(404);
    }
}
