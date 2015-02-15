<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 18:55
 */

namespace Chatbox\Auth\Driver;

use Chatbox\Auth\Eloquent\Auth;
use \Chatbox\Auth\UserInterface;

class Password implements AuthDriverInterface{

    /**
     * @var UserInterface
     */
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getUser($cred)
    {
        list($email,$password) = $this->parseCred($cred);
        $userAuth = Auth::where([
            "key" => $this->hashPassword($email,$password),
            "provider" => "password"
        ])->firstOrFail();
        if(!$userId = $userAuth->user_id){
            throw new \Exception("hoehoe");
        }
        if(!$user = $this->user->signUpFetchById($userId)){
            throw new \Exception("hoehoe2");
        }
        return $user;
    }

    public function bind(\Chatbox\Auth\UserInterface $user, $cred)
    {
        list($email,$password) = $this->parseCred($cred);

        return Auth::entry(
            $user->signUpGetId(),
            $this->hashPassword($email,$password),
            "password"
        );
    }

    public function parseCred($cred){
        if(!isset($cred["email"])||!isset($cred["password"])){
            throw new \Exception("password auth provider require 'email' and 'password' entry for credential argument");
        }
        $email = $cred["email"];
        $password = $cred["password"];
        return [$email,$password];
    }

    public function hashPassword($email,$password){
        return sha1(json_encode([$email,$password]));
    }


} 