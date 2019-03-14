<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TelevisionShowApiTest extends TestCase
{
    use MakeTelevisionShowTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTelevisionShow()
    {
        $televisionShow = $this->fakeTelevisionShowData();
        $this->json('POST', '/api/v1/televisionShows', $televisionShow);

        $this->assertApiResponse($televisionShow);
    }

    /**
     * @test
     */
    public function testReadTelevisionShow()
    {
        $televisionShow = $this->makeTelevisionShow();
        $this->json('GET', '/api/v1/televisionShows/'.$televisionShow->id);

        $this->assertApiResponse($televisionShow->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTelevisionShow()
    {
        $televisionShow = $this->makeTelevisionShow();
        $editedTelevisionShow = $this->fakeTelevisionShowData();

        $this->json('PUT', '/api/v1/televisionShows/'.$televisionShow->id, $editedTelevisionShow);

        $this->assertApiResponse($editedTelevisionShow);
    }

    /**
     * @test
     */
    public function testDeleteTelevisionShow()
    {
        $televisionShow = $this->makeTelevisionShow();
        $this->json('DELETE', '/api/v1/televisionShows/'.$televisionShow->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/televisionShows/'.$televisionShow->id);

        $this->assertResponseStatus(404);
    }
}
