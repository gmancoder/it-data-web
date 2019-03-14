<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TelevisionShowEpisodeApiTest extends TestCase
{
    use MakeTelevisionShowEpisodeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->fakeTelevisionShowEpisodeData();
        $this->json('POST', '/api/v1/televisionShowEpisodes', $televisionShowEpisode);

        $this->assertApiResponse($televisionShowEpisode);
    }

    /**
     * @test
     */
    public function testReadTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->makeTelevisionShowEpisode();
        $this->json('GET', '/api/v1/televisionShowEpisodes/'.$televisionShowEpisode->id);

        $this->assertApiResponse($televisionShowEpisode->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->makeTelevisionShowEpisode();
        $editedTelevisionShowEpisode = $this->fakeTelevisionShowEpisodeData();

        $this->json('PUT', '/api/v1/televisionShowEpisodes/'.$televisionShowEpisode->id, $editedTelevisionShowEpisode);

        $this->assertApiResponse($editedTelevisionShowEpisode);
    }

    /**
     * @test
     */
    public function testDeleteTelevisionShowEpisode()
    {
        $televisionShowEpisode = $this->makeTelevisionShowEpisode();
        $this->json('DELETE', '/api/v1/televisionShowEpisodes/'.$televisionShowEpisode->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/televisionShowEpisodes/'.$televisionShowEpisode->id);

        $this->assertResponseStatus(404);
    }
}
