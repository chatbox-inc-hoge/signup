<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Config\Config;
use Chatbox\Auth\UserInterface;

class UserObjectProvider {

    public function __invoke(Config $config)
    {
        $user = $config->get("user");

        if($user instanceof UserInterface){
            return $user;
        }else{
            throw new \Exception("invalid user object");
        }
    }


}