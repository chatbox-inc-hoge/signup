<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 18:55
 */

namespace Chatbox\Auth\Driver;

use Chatbox\Auth\Eloquent\ModelAuth;
use \Chatbox\Auth\UserInterface;

class Token implements AuthDriverInterface{

    protected $providerName = "token";
    /**
     * @var UserInterface
     */
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @param $token
     * @return UserInterface
     * @throws \Exception
     */
    public function getUser($token)
    {
        $userAuth = ModelAuth::findByToken($token,$this->providerName);

        if(!$userAuth){
            throw new \Exception("hoehoe $token");
        }
        if(!$userId = $userAuth->user_id){
            throw new \Exception("hoehoe");
        }
        if(!$user = $this->user->signUpFetchById($userId)){
            throw new \Exception("hoehoe2");
        }
        return $user;
    }

    public function bind(\Chatbox\Auth\UserInterface $user, $token){
        return ModelAuth::insert($user->signUpGetId(),$token,$this->providerName);
    }




} 