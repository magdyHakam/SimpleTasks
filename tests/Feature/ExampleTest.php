<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test for statistics page.
     *
     * @return void
     */
    public function test_statistics_page()
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);
    }

    /**
     * A basic test for Create task page.
     *
     * @return void
     */
    public function test_create_task_page()
    {
        $response = $this->get('/create');

        $response->assertStatus(200);
    }

    /**
     * A basic test for list tasks pagination page.
     *
     * @return void
     */
    public function test_list_tasks_pagination_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * test if user can see home page link in navbar.
     *
     * @return void
     */
    public function test_user_can_see_home_link_in_navbar()
    {
        $response = $this->get('/')
                    ->assertSee('Home');
    }

    /**
     * test if user can create new task.
     *
     * @return void
     */
    public function test_user_can_create_new_task()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])
                    ->post('/store', [
                "title"=> 'Task Sample',
                "description"=> 'Description Sample',
                "assigned_to_id"=> 200,
                "assigned_by_id"=> 3
        ])
                    ->assertSessionHasNoErrors();
    }
}
