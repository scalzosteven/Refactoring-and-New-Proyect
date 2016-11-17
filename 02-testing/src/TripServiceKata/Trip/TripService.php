<?php

namespace TripServiceKata\Trip;

use TripServiceKata\Exception\UserNotLoggedInException;
use TripServiceKata\User\User;
use TripServiceKata\User\UserSession;

class TripService
{
    private $loggedUser;

    public function __construct($loggedUser)
    {
        $this->loggedUser = $loggedUser;
    }

    public function getTripsByUser(User $user)
    {
        $tripList = array();
        $loggedUser = $this->obtainLoggedUser();

        $this->checkIfUserLogged($loggedUser);

        $isFriend = $user->areFriend($loggedUser);

        if ($isFriend) {
            $tripList = $this->obtainTripsByUser($user);
        }

        return $tripList;
    }

    private function checkIfUserLogged($loggedUser)
    {
        if ($loggedUser == null) {
            throw new UserNotLoggedInException();
        }
    }

    protected function obtainLoggedUser()
    {
        return $this->loggedUser;
    }

    /**
     * @param \TripServiceKata\User\User $user
     */
    protected function obtainTripsByUser(User $user)
    {
        return TripDAO::findTripsByUser($user);
    }
}
