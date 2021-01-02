<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function canAddNewCategory()
    {
        $category = Category::factory()->make()->toArray();
        $response = $this->postJson(route('categories.store'), $category);
        $response->assertSuccessful();
        $this->assertDatabaseCount('categories', 1);
        $this->assertDatabaseHas('categories', $category);

    }

    /**
     * @test
     *
     */
    public function canGetAllCategories()
    {
        $count = 10;
        $categories = Category::factory()->count($count)->create();
        $response = $this->getJson(route('categories.index'));
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $this->assertEquals($count, $responseDecoded->count());
        $this->assertDatabaseCount('categories', $count);
        $this->assertDatabaseHas('categories', $categories->only(['name', 'type'])->toArray());
    }

    /**
     * @test
     *
     */
    public function canGetACategory()
    {
        $category = Category::factory()->create();
        $response = $this->getJson(route('categories.show', $category->id));
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $response->assertJson($category->toArray());
        $this->assertDatabaseCount('categories', 1);
        $this->assertDatabaseHas('categories', $category->only(['name', 'type']));
    }

    /**
     * @test
     *
     */
    public function canUpdateACategory()
    {
        $category = Category::factory()->create();
        $categoryUpdateData = Category::factory()->make()->toArray();
        $response = $this->putJson(route('categories.update', $category->id), $categoryUpdateData);
        $response->assertSuccessful();
        $responseDecoded = $response->decodeResponseJson();
        $response->assertJson($categoryUpdateData);
        $this->assertDatabaseCount('categories', 1);
        $this->assertDatabaseHas('categories', $categoryUpdateData);
    }

    /**
     * @test
     *
     */
    public function canDeleteACategory()
    {
        $category = Category::factory()->create();
        $response = $this->deleteJson(route('categories.destroy', $category->id));
        $response->assertSuccessful();
        $this->assertDatabaseCount('categories', 0);
        $this->assertDatabaseMissing('categories', $category->only(['name', 'type']));
    }
}
