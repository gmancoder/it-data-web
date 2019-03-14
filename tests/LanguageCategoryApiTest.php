<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LanguageCategoryApiTest extends TestCase
{
    use MakeLanguageCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLanguageCategory()
    {
        $languageCategory = $this->fakeLanguageCategoryData();
        $this->json('POST', '/api/v1/languageCategories', $languageCategory);

        $this->assertApiResponse($languageCategory);
    }

    /**
     * @test
     */
    public function testReadLanguageCategory()
    {
        $languageCategory = $this->makeLanguageCategory();
        $this->json('GET', '/api/v1/languageCategories/'.$languageCategory->id);

        $this->assertApiResponse($languageCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLanguageCategory()
    {
        $languageCategory = $this->makeLanguageCategory();
        $editedLanguageCategory = $this->fakeLanguageCategoryData();

        $this->json('PUT', '/api/v1/languageCategories/'.$languageCategory->id, $editedLanguageCategory);

        $this->assertApiResponse($editedLanguageCategory);
    }

    /**
     * @test
     */
    public function testDeleteLanguageCategory()
    {
        $languageCategory = $this->makeLanguageCategory();
        $this->json('DELETE', '/api/v1/languageCategories/'.$languageCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/languageCategories/'.$languageCategory->id);

        $this->assertResponseStatus(404);
    }
}
