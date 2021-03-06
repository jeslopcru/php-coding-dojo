<?php

namespace TripServiceKata\Trip;

use TripServiceKata\Exception\UserNotLoggedInException;
use TripServiceKata\User\User;
use TripServiceKata\User\UserSession;

class TripService
{
    /** @var  UserSession */
    private $userSession;
    /** @var  TripDAO */
    private $tripDAO;

    public function __construct(UserSession $userSession, TripDAO $tripDAO)
    {
        $this->userSession = $userSession;
        $this->tripDAO = $tripDAO;
    }

    /**
     * @param User $user
     * @return array|void
     * @throws UserNotLoggedInException
     * @throws \TripServiceKata\Exception\
     */
    public function getTripsByUser(User $user)
    {
        $loggedUser = $this->getLoggedUser();
        $this->isUserLogged($loggedUser);
        $isFriend = $user->areFriends($loggedUser);
        $tripList = array();
        if ($isFriend) {
            $tripList = $this->getTripList($user);
        }
        return $tripList;
    }

    protected function getLoggedUser()
    {
        return $this->userSession->getLoggedUser();
    }

    private function isUserLogged($loggedUser)
    {
        if ($loggedUser === null) {
            throw new UserNotLoggedInException();
        }
    }

    protected function getTripList(User $user)
    {
        return $this->tripDAO->findTrips($user);
    }
}
