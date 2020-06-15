<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $response=$this->get('/');
        $response->assertStatus(200);
    }

    public function testCategoriesTest()
    {
        $response=$this->get('/api/categories');
        $response
            ->assertStatus(200);

    }

    public function testCategoryTest()
    {

        $this->withoutExceptionHandling();

        $response=$this->get('/api/categories/1');
        $response
            ->assertStatus(200);
    }

    public function testArticlesTest()
    {
        $response=$this->get('/api/articles');
        $response
            ->assertStatus(200);
    }

    public function testArticleTest()
    {
        $response=$this->get('/api/articles/1');
        $response
            ->assertStatus(200);
    }

    public function testArticlesSearchTest()
    {
        $response=$this->get('/api/articles/search?filter[title]=max');
        $response
            ->assertStatus(200);
    }
}
