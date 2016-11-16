<?php

namespace Test\TripServiceKata\Trip;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Exception\UserNotLoggedInException;
use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;

class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var TripServiceWrapper
     */
    private $tripService;

    protected function setUp()
    {
        $this->tripService = new TripServiceWrapper;
    }

    /** @test */
    public function
    given_a_not_logged_user_retrieve_exception()
    {
        // given
        $this->tripService->loggedUserWrapper = null;

        // then
        $this->setExpectedException(UserNotLoggedInException::class);

        // when
        $this->tripService->getTripsByUser(new User(null));
    }
}

class TripServiceWrapper extends TripService
{
    public $loggedUserWrapper;

    protected function obtainLoggedUser()
    {
        return $this->loggedUserWrapper;
    }
}