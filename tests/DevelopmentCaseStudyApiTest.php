<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DevelopmentCaseStudyApiTest extends TestCase
{
    use MakeDevelopmentCaseStudyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->fakeDevelopmentCaseStudyData();
        $this->json('POST', '/api/v1/developmentCaseStudies', $developmentCaseStudy);

        $this->assertApiResponse($developmentCaseStudy);
    }

    /**
     * @test
     */
    public function testReadDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->makeDevelopmentCaseStudy();
        $this->json('GET', '/api/v1/developmentCaseStudies/'.$developmentCaseStudy->id);

        $this->assertApiResponse($developmentCaseStudy->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->makeDevelopmentCaseStudy();
        $editedDevelopmentCaseStudy = $this->fakeDevelopmentCaseStudyData();

        $this->json('PUT', '/api/v1/developmentCaseStudies/'.$developmentCaseStudy->id, $editedDevelopmentCaseStudy);

        $this->assertApiResponse($editedDevelopmentCaseStudy);
    }

    /**
     * @test
     */
    public function testDeleteDevelopmentCaseStudy()
    {
        $developmentCaseStudy = $this->makeDevelopmentCaseStudy();
        $this->json('DELETE', '/api/v1/developmentCaseStudies/'.$developmentCaseStudy->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/developmentCaseStudies/'.$developmentCaseStudy->id);

        $this->assertResponseStatus(404);
    }
}
