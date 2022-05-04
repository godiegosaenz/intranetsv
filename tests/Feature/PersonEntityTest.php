<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PersonEntity;

class PersonEntityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //$PersonEntity = PersonEntity::factory()->times(20)->create();
        $PersonEntity = PersonEntity::factory()->enterprise()->create();
    }
}
