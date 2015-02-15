<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:25
 */

namespace Chatbox\Auth\Util;

use Chatbox\SimpleKVS\SimpleKVS;

use Chatbox\Auth\UserInterface;
use Chatbox\Str;


abstract class Envelope {

    static public function load($key,SimpleKVS $kvs,UserInterface $user){
        $model = $kvs->get($key);
        return new static($model->getArrayValue(),$kvs,$user);
    }

    protected $data;
    /** @var \Chatbox\SimpleKVS\SimpleKVS */
    protected $kvs;
    /** @var \Chatbox\Auth\UserInterface */
    protected $user;

    function __construct(array $data,SimpleKVS $kvs,UserInterface $user)
    {
        $this->data = $data;
        $this->kvs = $kvs;
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function publish(){
        $key = Str::random(16);
        return $this->kvs->set($key,$this->data);
    }

    public function getData(){
        return $this->data;
    }

    abstract function accept();
}