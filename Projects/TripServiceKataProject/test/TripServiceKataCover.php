<?php

namespace TripServiceKata\Test;

use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;

class TripServiceKataCover extends TripService
{
    private $loggedUser;

    /**
     * TestableTripService constructor.
     * @param $loggedUser
     */
    public function __construct($loggedUser)
    {
        $this->loggedUser = $loggedUser;
    }

    protected function getLoggedUser()
    {
        return $this->loggedUser;
    }

    protected function getTripList(User $user)
    {
        return $user;
    }
}
