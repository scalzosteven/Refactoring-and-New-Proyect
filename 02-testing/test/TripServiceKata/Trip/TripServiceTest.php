<?php

namespace Test\TripServiceKata\Trip;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Exception\UserNotLoggedInException;
use TripServiceKata\Trip\Trip;
use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;

class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var TripServiceWrapper
     */
    private $tripService;

    /** @test */
    public function
    given_a_not_logged_user_retrieve_exception()
    {
        // given
        $this->tripService = new TripServiceWrapper(null);

        // then
        $this->setExpectedException(UserNotLoggedInException::class);

        // when
        $this->tripService->getTripsByUser(new User(null));
    }

    /** @test */
    public function
    if_users_are_not_friends_then_obtain_empty_list()
    {
        // given
        $this->tripService = new TripServiceWrapper(new User('Forever Alone'));

        // when
        $tripList = $this->tripService->getTripsByUser(new User('Other User Not Friend Of me'));

        // then
        $this->assertEquals([], $tripList);
    }

    /** @test */
    public function
    if_user_logged_is_friend_of_trip_user_then_obtains_a_trip()
    {
        // given
        $user = new User('Friendship Person');
        $this->tripService = new TripServiceWrapper($user);

        $friend = new User('Other User Friend of me');
        $friend->addFriend($user);

        // when
        $tripList = $this->tripService->getTripsByUser($friend);

        // then
        $this->assertNotEmpty($tripList);
    }
}

class TripServiceWrapper extends TripService
{
    public $loggedUserWrapper;

    protected function obtainTripsByUser(User $user)
    {
        return array(1, 2, 3);
    }
}