<?php

namespace Tests\Feature;

use App\Models\catigory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {

        $this->withoutExceptionHandling();
        $response = $this->post('/catigory', [
            'types' => 'hello',

        ]);

        $response->assertStatus(200);
        // $this->assertCount(1,catigory::all());
    }

    /** @test */
    public function has_and_error()
    {

        $response = $this->post('/catigory', [
            'types' => '',

        ]);

        $response->assertSessionHasErrors('types');
    }

    /** @test */
    public function has_and_update()
    {

        $this->post('/catigory', [
            'types' => '',

        ]);

        $catigory = catigory::first();
        $response = $this->patch('catigory/'.$catigory->id, [
            'types' => 'new types', ]);

        $this->assertEquals('new types', $catigory::first()->types);

    }
}
