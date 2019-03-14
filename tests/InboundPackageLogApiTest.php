<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InboundPackageLogApiTest extends TestCase
{
    use MakeInboundPackageLogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInboundPackageLog()
    {
        $inboundPackageLog = $this->fakeInboundPackageLogData();
        $this->json('POST', '/api/v1/inboundPackageLogs', $inboundPackageLog);

        $this->assertApiResponse($inboundPackageLog);
    }

    /**
     * @test
     */
    public function testReadInboundPackageLog()
    {
        $inboundPackageLog = $this->makeInboundPackageLog();
        $this->json('GET', '/api/v1/inboundPackageLogs/'.$inboundPackageLog->id);

        $this->assertApiResponse($inboundPackageLog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInboundPackageLog()
    {
        $inboundPackageLog = $this->makeInboundPackageLog();
        $editedInboundPackageLog = $this->fakeInboundPackageLogData();

        $this->json('PUT', '/api/v1/inboundPackageLogs/'.$inboundPackageLog->id, $editedInboundPackageLog);

        $this->assertApiResponse($editedInboundPackageLog);
    }

    /**
     * @test
     */
    public function testDeleteInboundPackageLog()
    {
        $inboundPackageLog = $this->makeInboundPackageLog();
        $this->json('DELETE', '/api/v1/inboundPackageLogs/'.$inboundPackageLog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inboundPackageLogs/'.$inboundPackageLog->id);

        $this->assertResponseStatus(404);
    }
}
