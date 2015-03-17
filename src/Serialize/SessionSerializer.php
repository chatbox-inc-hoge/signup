<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 20:20
 */

namespace Chatbox\Auth\Serialize;

use \Chatbox\Auth\UserInterface;
use Arr;

class SessionSerializer implements SerializeInterface{

    protected $key = "SIGNUP_AUTH_KEY";


    public function save(UserInterface $user)
    {
        isset($_SESSION) or session_start();
        $_SESSION[$this->key] = serialize($user);
    }

    /**
     * @param null $key
     * @return \Chatbox\Auth\UserInterface
     */
    public function load($key=null,$default=null)
    {
        isset($_SESSION) or session_start();
        if($data = Arr::get($_SESSION,$this->key)){
            $user = unserialize($data);
            if($user instanceof UserInterface){
                return $user;
            }
        }
        return $default;
    }

    public function reset(UserInterface $user)
    {
        isset($_SESSION) or session_start();
        throw new Exception("not implemented yet");
    }

    /**
     * @param null $key
     * @return \Chatbox\Auth\UserInterface
     */
    public function delete($key=null)
    {
        isset($_SESSION) or session_start();
        throw new Exception("not implemented yet");
    }


} 