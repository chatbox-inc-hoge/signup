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

class Password extends Token{

    protected $providerName = "password";

    public function getToken($userId,$password){
        return sha1(json_encode([
            "userId" => "$userId",
            "password" => "$password"
        ]));
    }
} 