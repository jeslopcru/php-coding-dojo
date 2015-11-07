<?php

namespace TripServiceKata\Trip;

use TripServiceKata\Exception\UserNotLoggedInException;
use TripServiceKata\User\User;
use TripServiceKata\User\UserSession;

class TripService
{
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
        $isFriend = $this->areFriends($user, $loggedUser);
        $tripList = array();
        if ($isFriend) {
            $tripList = $this->getTripList($user);
        }
        return $tripList;

    }

    protected function getLoggedUser()
    {
        return UserSession::getInstance()->getLoggedUser();
    }

    private function isUserLogged($loggedUser)
    {
        if ($loggedUser === null) {
            throw new UserNotLoggedInException();

        }
    }

    /**
     * @param User $user
     * @param $loggedUser
     * @return bool
     */
    private function areFriends(User $user, $loggedUser)
    {
        $isFriend = false;
        foreach ($user->getFriends() as $friend) {
            if ($friend == $loggedUser) {
                $isFriend = true;
                break;
            }
        }
        return $isFriend;
    }

    protected function getTripList(User $user)
    {
        return TripDAO::findTripsByUser($user);
    }
}
