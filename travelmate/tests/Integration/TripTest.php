<?php
namespace Tests\Integration;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestResponse;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TripTest extends TestCase
{
    /** @test */
    public function trip_is_loaded()
    {
        $this->get('/planner')
            ->type("Paris","destiantion1")
            ->type("07/02/2019","start")
            ->type("07/24/2019","return")
            ->press("NextTrip")
            ->see("Paris")
            ->onPage('trip');
    }
    /** @test */
    public function auto_suggest_load()
    {
        $this->get('/')
            ->type("M","to")
            ->see("Munich")
            ->see("Hambur")
            ->see("Bremen");
    }
    /** @test */
    public function auto_suggest_load()
    {
        $this->get('/trips')
            ->click("More details")
            ->see("The trip was")
            ->onPage('trips/9');
    }
}