<?php

namespace TripServiceKata\Test;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;

class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var TripService
     */
    private $tripService;

    /** @test */
    public function it_does_something()
    {
        $user = new User('Jesus');
        $this->tripService->getTripsByUser($user);
    }

    protected function setUp()
    {
        $this->tripService = new TripServiceCover;
    }
}

class TripServiceCover extends TripService
{

}
