<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InboundPackageApiTest extends TestCase
{
    use MakeInboundPackageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInboundPackage()
    {
        $inboundPackage = $this->fakeInboundPackageData();
        $this->json('POST', '/api/v1/inboundPackages', $inboundPackage);

        $this->assertApiResponse($inboundPackage);
    }

    /**
     * @test
     */
    public function testReadInboundPackage()
    {
        $inboundPackage = $this->makeInboundPackage();
        $this->json('GET', '/api/v1/inboundPackages/'.$inboundPackage->id);

        $this->assertApiResponse($inboundPackage->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInboundPackage()
    {
        $inboundPackage = $this->makeInboundPackage();
        $editedInboundPackage = $this->fakeInboundPackageData();

        $this->json('PUT', '/api/v1/inboundPackages/'.$inboundPackage->id, $editedInboundPackage);

        $this->assertApiResponse($editedInboundPackage);
    }

    /**
     * @test
     */
    public function testDeleteInboundPackage()
    {
        $inboundPackage = $this->makeInboundPackage();
        $this->json('DELETE', '/api/v1/inboundPackages/'.$inboundPackage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inboundPackages/'.$inboundPackage->id);

        $this->assertResponseStatus(404);
    }
}
