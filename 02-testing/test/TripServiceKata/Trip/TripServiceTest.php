<?php

namespace Test\TripServiceKata\Trip;

use PHPUnit_Framework_TestCase;
use TripServiceKata\Exception\UserNotLoggedInException;
use TripServiceKata\Trip\TripService;
use TripServiceKata\User\User;


class TripServiceTest extends PHPUnit_Framework_TestCase
{
    /** @var  User */
    private $user;

    /** @var  User */
    private $userLogged;

    /** @var  User */
    private $withoutFriends;

    /** @var  User */
    private $friendshipUser;

    /** @var User */
    private $friend;

    protected function setUp()
    {
        parent::setUp();
        $this->user = new User('Not Friend of Me');
        $this->userLogged = new User('User Logged');
        $this->withoutFriends = new User('Forever Alone');
        $this->friendshipUser = new User('Friendship User');
        $this->friend = new User('Other User Friend of me');
        $this->friend->addFriend($this->friendshipUser);
    }

    /** @test */
    public function
    given_a_not_logged_user_retrieve_exception()
    {
        // given
        $tripService = new TripServiceWrapper(null);

        // then
        $this->setExpectedException(UserNotLoggedInException::class);

        // when
        $tripService->getTripsByUser(new User(null));
    }

    /** @test */
    public function
    if_users_are_not_friends_then_obtain_empty_list()
    {
        // given
        $tripService = new TripServiceWrapper($this->withoutFriends);

        // when
        $tripList = $tripService->getTripsByUser($this->user);

        // then
        $this->assertEquals([], $tripList);
    }

    /** @test */
    public function
    if_user_logged_is_friend_of_trip_user_then_obtains_a_trip()
    {
        // given
        $tripService = new TripServiceWrapper($this->friendshipUser);

        // when
        $tripList = $tripService->getTripsByUser($this->friend);

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