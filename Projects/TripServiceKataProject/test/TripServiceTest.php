<?php

namespace TripServiceKata\Test;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Trip\TripService;

class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var TripService
     */
    private $tripService;

    /** @test */ public function
    it_does_something() {
        $this->fail('This test has not been implemented yet.');
    }

    protected function setUp()
    {
        $this->tripService = new TripService;
    }
}
