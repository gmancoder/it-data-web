<?php

use App\Models\LanguageCategory;
use App\Repositories\LanguageCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LanguageCategoryRepositoryTest extends TestCase
{
    use MakeLanguageCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LanguageCategoryRepository
     */
    protected $languageCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->languageCategoryRepo = App::make(LanguageCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLanguageCategory()
    {
        $languageCategory = $this->fakeLanguageCategoryData();
        $createdLanguageCategory = $this->languageCategoryRepo->create($languageCategory);
        $createdLanguageCategory = $createdLanguageCategory->toArray();
        $this->assertArrayHasKey('id', $createdLanguageCategory);
        $this->assertNotNull($createdLanguageCategory['id'], 'Created LanguageCategory must have id specified');
        $this->assertNotNull(LanguageCategory::find($createdLanguageCategory['id']), 'LanguageCategory with given id must be in DB');
        $this->assertModelData($languageCategory, $createdLanguageCategory);
    }

    /**
     * @test read
     */
    public function testReadLanguageCategory()
    {
        $languageCategory = $this->makeLanguageCategory();
        $dbLanguageCategory = $this->languageCategoryRepo->find($languageCategory->id);
        $dbLanguageCategory = $dbLanguageCategory->toArray();
        $this->assertModelData($languageCategory->toArray(), $dbLanguageCategory);
    }

    /**
     * @test update
     */
    public function testUpdateLanguageCategory()
    {
        $languageCategory = $this->makeLanguageCategory();
        $fakeLanguageCategory = $this->fakeLanguageCategoryData();
        $updatedLanguageCategory = $this->languageCategoryRepo->update($fakeLanguageCategory, $languageCategory->id);
        $this->assertModelData($fakeLanguageCategory, $updatedLanguageCategory->toArray());
        $dbLanguageCategory = $this->languageCategoryRepo->find($languageCategory->id);
        $this->assertModelData($fakeLanguageCategory, $dbLanguageCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLanguageCategory()
    {
        $languageCategory = $this->makeLanguageCategory();
        $resp = $this->languageCategoryRepo->delete($languageCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(LanguageCategory::find($languageCategory->id), 'LanguageCategory should not exist in DB');
    }
}
