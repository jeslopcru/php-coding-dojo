<?php

namespace TripServiceKata\Test;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Trip\Trip;
use TripServiceKata\User\User;

class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function ifUserNotLoggedThrowException()
    {
        $this->setExpectedException('TripServiceKata\Exception\UserNotLoggedInException');
        $tripService = new TripServiceKataCover(null);
        $user = new User('Jesus');
        $tripService->getTripsByUser($user);
    }

    /** @test */
    public function whenUsersHasNoFriendsReturnAnEmptyList()
    {
        $loggedUser = new User('LoggedUserName');
        $tripService = new TripServiceKataCover($loggedUser);
        $user = new User('Jesus');

        $result = $tripService->getTripsByUser($user);

        $this->assertEquals([], $result);
    }

    /** @test */
    public function whenUsersHasFriendsReturnTripListOfAFriend()
    {
        $loggedUser = new User('LoggedUserName');
        $jesus = new User('Jesus');
        $jesus->addFriend($loggedUser);
        $trip = new Trip();
        $jesus->addTrip($trip);

        $tripService = new TripServiceKataCover($loggedUser);
        $result = $tripService->getTripsByUser($jesus);

        $this->assertEquals([$trip], $result);
    }
}
