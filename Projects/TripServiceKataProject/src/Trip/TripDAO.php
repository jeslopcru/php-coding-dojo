<?php

namespace TripServiceKata\Trip;

use TripServiceKata\Exception\DependentClassCalledDuringUnitTestException;
use User;

class TripDAO
{
    public static function findTripsByUser(User $user)
    {
        throw new DependentClassCalledDuringUnitTestException('TripDAO should not be invoked on an unit test.');
    }
}
