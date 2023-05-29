<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ClickCounts;

class ClickCountsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_see_count_number()
    {

        $clickCount = factory("App\ClickCounts")->create();
        $response = $this->get('/api/click_counts');
        $response->assertSee($clickCount->count);
    }

    public function test_can_add_count_number()
    {
        $clickCount = factory("App\ClickCounts")->make();
        $this->post('/api/increment', $clickCount->toArray());
        $this->assertEquals(1, ClickCounts::all()->count());
    }
}
