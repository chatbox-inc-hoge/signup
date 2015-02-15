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

class UserObjectProvider implements \Pimple\ServiceProviderInterface{
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
        $user = Arr::get($pimple["config"],"user");

        if($user instanceof UserInterface || is_callable($user)){
            $pimple["user"] = $user;
        }else{
            throw new Exception("invalid user object");
        }
    }


}