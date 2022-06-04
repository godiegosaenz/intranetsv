<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Establishments;

class EstablishmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Establishments::factory()->times(20)->hoteles()->create();
        Establishments::factory()->times(7)->hosteria()->create();
        Establishments::factory()->times(5)->hostal()->create();
        Establishments::factory()->times(3)->hacienda_turistica()->create();
        Establishments::factory()->times(6)->lodge()->create();
        Establishments::factory()->times(3)->resort()->create();
        Establishments::factory()->times(26)->restaurantes()->create();
        Establishments::factory()->times(15)->cafeterias()->create();
        Establishments::factory()->times(32)->bares()->create();
        Establishments::factory()->times(15)->discoteca()->create();
        Establishments::factory()->times(3)->agenda_viaje_dual()->create();
        Establishments::factory()->times(1)->agenda_viaje_internacional()->create();
        Establishments::factory()->times(2)->centros_comunitarios()->create();
        Establishments::factory()->times(2)->parque_atracciones()->create();
    }
}
