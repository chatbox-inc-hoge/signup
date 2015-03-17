<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 20:20
 */

namespace Chatbox\Auth\Serialize;

use \Chatbox\Auth\UserInterface;

use \Chatbox\Str;

class TokenSerializer implements SerializeInterface{

    /**
     * @var \Chatbox\SimpleKVS\Driver\SimpleDB
     */
    protected $kvs;

    function __construct()
    {
        $this->kvs = new \Chatbox\SimpleKVS\Driver\SimpleDB([
            "table"=>"signup_tmp_token"
        ]);
    }


    public function save(UserInterface $user)
    {
        $token = Str::random(16);
        $this->kvs->set($token,serialize($user));
        return $token;
    }

    /**
     * @param null $key
     * @return \Chatbox\Auth\UserInterface
     */
    public function load($key=null,$default=null)
    {
        if($key && ($data = $this->kvs->get($key))){
            $user = unserialize($data->getValue());
            if($user instanceof UserInterface){
                return $user;
            }
        }
        return $default;
    }

    public function reset(UserInterface $user)
    {
        throw new Exception("not implemented yet");
    }

    /**
     * @param null $key
     * @return \Chatbox\Auth\UserInterface
     */
    public function delete($key=null)
    {
        throw new Exception("not implemented yet");
    }


} 