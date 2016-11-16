<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;
use TripServiceKata\User\UserSession;
use TripServiceKata\Exception\UserNotLoggedInException;

class TripService
{
    public function getTripsByUser(User $user) {
        $tripList = array();
        $loggedUser = $this->obtainLoggedUser();
        $isFriend = false;
        if ($loggedUser != null) {
            foreach ($user->getFriends() as $friend) {
                if ($friend == $loggedUser) {
                    $isFriend = true;
                    break;
                }
            }
            if ($isFriend) {
                $tripList = $this->obtainTripsByUser($user);
            }
            return $tripList;
        } else {
            throw new UserNotLoggedInException();
        }
    }

    protected function obtainLoggedUser()
    {
        return UserSession::getInstance()->getLoggedUser();
    }

    /**
     * @param \TripServiceKata\User\User $user
     */
    protected function obtainTripsByUser(User $user)
    {
        return TripDAO::findTripsByUser($user);
    }
}
