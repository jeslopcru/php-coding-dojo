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
    public function ifUserNotLoggedThrowException()
    {
        $this->setExpectedException('TripServiceKata\Exception\UserNotLoggedInException');
        $user = new User('Jesus');
        $this->tripService->getTripsByUser($user);
    }

    protected function setUp()
    {
        $this->tripService = new TripServiceKataCover(null);
    }
}
