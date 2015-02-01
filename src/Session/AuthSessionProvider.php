<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Chatbox\Auth\Session;

/**
 *
 * @package Wap
 */
class AuthSessionProvider {

    protected $onGet;

    protected $onSet;

    public function onGet($closure){
        $this->onGet = $closure;
        return $this;
    }
    public function onSet($closure){
        $this->onSet = $closure;
        return $this;
    }

    /**
     * @param null $default
     * @return UserInterface
     * @throws \Exception
     */
    public function get($default=null){
        if($this->onGet){
            return call_user_func($this->onGet,$default);
        }else{
            throw new \Exception("you must set onGet closure");
        }
    }

    public function set($default){
        if($this->onSet){
            return call_user_func($this->onSet,$default);
        }else{
            throw new \Exception("you must set onSet closure");
        }
    }
}