<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Arr;
use Chatbox\Auth\UserInterface;

class SerializerProvider implements \Pimple\ServiceProviderInterface{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param \Pimple\Container $pimple An Container instance
     */
    public function register(\Pimple\Container $pimple)
    {
//        $user = Arr::get($pimple["config"],"user");

        $pimple["serialize.session"] = function(\Pimple\Container $pimple){
            return new \Chatbox\Auth\Serialize\SessionSerializer();
        };
        $pimple["serialize.token"] = function(\Pimple\Container $pimple){
            return new \Chatbox\Auth\Serialize\TokenSerializer();
        };

//        if($user instanceof UserInterface || is_callable($user)){
//            $pimple["user"] = $user;
//        }else{
//            throw new Exception("invalid user object");
//        }
    }


}