<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 20:20
 */

namespace Chatbox\Auth\Serialize;

use \Chatbox\Auth\UserInterface;

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
    public function load($key=null)
    {
        isset($_SESSION) or session_start();
        if($data = $_SESSION[$this->key]){
            $user = unserialize($data);
            if($user instanceof UserInterface){
                return $user;
            }
        }
        throw new Exception("hogehogehoge");
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