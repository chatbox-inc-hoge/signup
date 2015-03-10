<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Config\Config;
use Chatbox\Auth\Driver\Password;
use Chatbox\Auth\UserInterface;

class AuthDriverProvider{

    public function __invoke(Config $config,UserInterface $user)
    {
        $arr = [];
        $arr["password"] = new Password($user);

        return $arr;
    }


}