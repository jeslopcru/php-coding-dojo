<?php

namespace TripServiceKata\Test;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Trip\Trip;
use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;

class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /** @var  User */
    private $noFriendsUser;
    /** @var  User */
    private $withFriendsUser;
    /** @var  User */
    private $loggedUser;
    /** @var  TripService */
    private $tripService;

    public function setUp()
    {
        parent::setUp();
        //Logged User
        $this->loggedUser = new User('LoggedUserName');
        $this->createNoFriend();
        $this->createFriend();
        $this->tripService = new TripServiceKataCover($this->loggedUser);

    }

    private function createNoFriend()
    {
        $this->noFriendsUser = new User('AloneName');
        $this->noFriendsUser->addTrip(new Trip('BackpackerTrip'));
    }

    private function createFriend()
    {
        $this->withFriendsUser = new User('FriendlyName');
        $this->withFriendsUser->addFriend($this->loggedUser);
        $this->withFriendsUser->addTrip(new Trip('FriendsWithFriends'));
    }

    /** @test */
    public function ifUserNotLoggedThrowException()
    {
        $this->setExpectedException('TripServiceKata\Exception\UserNotLoggedInException');
        $tripService = new TripServiceKataCover(null);
        $tripService->getTripsByUser($this->getAnyUserHelper());
    }

    /**
     * @return User
     */
    private function getAnyUserHelper()
    {
        return new User('Foo User');
    }

    /** @test */
    public function whenUsersHasNoFriendsReturnAnEmptyList()
    {
        $tripsByUser = $this->tripService->getTripsByUser($this->getNoFriendUserHelper());
        $this->assertEquals([], $tripsByUser);
    }

    /**
     * @return User
     */
    private function getNoFriendUserHelper()
    {
        return $this->noFriendsUser;
    }

    /** @test */
    public function whenUsersHasFriendsReturnTripListOfAFriend()
    {
        $result = $this->tripService->getTripsByUser($this->getWithFriendUserHelper());

        $this->assertEquals($this->getWithFriendUserHelper()->getTrips(), $result);
    }

    /**
     * @return mixed
     */
    private function getWithFriendUserHelper()
    {
        return $this->withFriendsUser;
    }
}
