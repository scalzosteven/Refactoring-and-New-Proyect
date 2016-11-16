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
        try {
            $this->tripService->getTripsByUser(new User(null));
        } catch (UserNotLoggedInException $exception) {
            $this->assertTrue(true);
        }
    }
}

class TripServiceWrapper extends TripService
{
    protected function obtainLoggedUser()
    {
        return null;
    }
}