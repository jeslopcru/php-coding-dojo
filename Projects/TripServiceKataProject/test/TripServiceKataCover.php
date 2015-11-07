<?php

namespace TripServiceKata\Test;

use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;

class TripServiceKataCover extends TripService
{
    protected function getTripList(User $user)
    {
        return $user->getTrips();
    }
}
