<?php

namespace TripServiceKata\Trip;

use TripServiceKata\Exception\DependentClassCalledDuringUnitTestException;
use TripServiceKata\User\User;

class TripDAO
{
    public function findTrips($user)
    {
        return self::findTripsByUser($user);
    }

    public static function findTripsByUser(User $user)
    {
        throw new DependentClassCalledDuringUnitTestException('TripDAO should not be invoked on an unit test.');
    }
}
