<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LastRunApiTest extends TestCase
{
    use MakeLastRunTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLastRun()
    {
        $lastRun = $this->fakeLastRunData();
        $this->json('POST', '/api/v1/lastRuns', $lastRun);

        $this->assertApiResponse($lastRun);
    }

    /**
     * @test
     */
    public function testReadLastRun()
    {
        $lastRun = $this->makeLastRun();
        $this->json('GET', '/api/v1/lastRuns/'.$lastRun->id);

        $this->assertApiResponse($lastRun->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLastRun()
    {
        $lastRun = $this->makeLastRun();
        $editedLastRun = $this->fakeLastRunData();

        $this->json('PUT', '/api/v1/lastRuns/'.$lastRun->id, $editedLastRun);

        $this->assertApiResponse($editedLastRun);
    }

    /**
     * @test
     */
    public function testDeleteLastRun()
    {
        $lastRun = $this->makeLastRun();
        $this->json('DELETE', '/api/v1/lastRuns/'.$lastRun->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lastRuns/'.$lastRun->id);

        $this->assertResponseStatus(404);
    }
}
