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
use Chatbox\Auth\Driver\AuthDriverInterface;

class AuthDriverProvider{

    public function __invoke(Config $config,UserInterface $user)
    {
        $arr = [];
        foreach($config->get("auth") as $key=>$authDriverClassName){
            if(is_subclass_of($authDriverClassName,"\\Chatbox\\Auth\\Driver\\AuthDriverInterface")){
                $arr[$key] = new $authDriverClassName($user);
            }else{
                throw new \Exception("invalid argument");
            }
        }
        return $arr;
    }


}