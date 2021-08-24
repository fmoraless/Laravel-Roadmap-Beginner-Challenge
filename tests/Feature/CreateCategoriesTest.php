<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_users_can_not_create_categories()
    {
        $response = $this->post(route('categories.store'), ['name' => 'First Category']);

        $response->assertRedirect('login');
    }

    /** @test */
    public function an_authenticaded_user_can_create_categories()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['email' => 'admin@admin.com']);
        $this->actingAs($user);

        $this->post(route('categories.store'), ['name' => 'First Category']);

        $this->assertDatabaseHas('categories', [
            'name' => 'First Category'
        ]);
    }

    /** @test */
    public function category_requires_a_name()
    {
        $user = factory(User::class)->create(['email' => 'admin@admin.com']);
        $this->actingAs($user);

        $response = $this->post(route('categories.store'), ['name' => '']);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_authenticaded_user_can_update_categories()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['email' => 'admin@admin.com']);
        $this->actingAs($user);

        $this->post('/categories', [
            'name' => 'First Category'
        ]);
        $category = Category::first();
        $response = $this->patch(route('categories.update',$category) ,[
           'name' => 'New name'
        ]);

        $this->assertEquals('New name', Category::first());

        $this->assertDatabaseHas('categories', [
            'name' => 'First Category'
        ]);
    }

    /** @test */
    public function a_category_can_be_deleted()
    {

    }
}
