<?php

use App\Models\NewsFeed;
use App\Repositories\NewsFeedRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsFeedRepositoryTest extends TestCase
{
    use MakeNewsFeedTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NewsFeedRepository
     */
    protected $newsFeedRepo;

    public function setUp()
    {
        parent::setUp();
        $this->newsFeedRepo = App::make(NewsFeedRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNewsFeed()
    {
        $newsFeed = $this->fakeNewsFeedData();
        $createdNewsFeed = $this->newsFeedRepo->create($newsFeed);
        $createdNewsFeed = $createdNewsFeed->toArray();
        $this->assertArrayHasKey('id', $createdNewsFeed);
        $this->assertNotNull($createdNewsFeed['id'], 'Created NewsFeed must have id specified');
        $this->assertNotNull(NewsFeed::find($createdNewsFeed['id']), 'NewsFeed with given id must be in DB');
        $this->assertModelData($newsFeed, $createdNewsFeed);
    }

    /**
     * @test read
     */
    public function testReadNewsFeed()
    {
        $newsFeed = $this->makeNewsFeed();
        $dbNewsFeed = $this->newsFeedRepo->find($newsFeed->id);
        $dbNewsFeed = $dbNewsFeed->toArray();
        $this->assertModelData($newsFeed->toArray(), $dbNewsFeed);
    }

    /**
     * @test update
     */
    public function testUpdateNewsFeed()
    {
        $newsFeed = $this->makeNewsFeed();
        $fakeNewsFeed = $this->fakeNewsFeedData();
        $updatedNewsFeed = $this->newsFeedRepo->update($fakeNewsFeed, $newsFeed->id);
        $this->assertModelData($fakeNewsFeed, $updatedNewsFeed->toArray());
        $dbNewsFeed = $this->newsFeedRepo->find($newsFeed->id);
        $this->assertModelData($fakeNewsFeed, $dbNewsFeed->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNewsFeed()
    {
        $newsFeed = $this->makeNewsFeed();
        $resp = $this->newsFeedRepo->delete($newsFeed->id);
        $this->assertTrue($resp);
        $this->assertNull(NewsFeed::find($newsFeed->id), 'NewsFeed should not exist in DB');
    }
}
