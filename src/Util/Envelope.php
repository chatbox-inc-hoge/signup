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


/**
 * Userオブジェクトを持っているという利便性
 * KVSからデータを取り出して処理させる仕組み
 * 処理のみ継承先で実装すればOK
 * @package Chatbox\Auth\Util
 */
abstract class Envelope {

//    static public function load($key,SimpleKVS $kvs,UserInterface $user){
//        $model = $kvs->get($key);
//        return new static($model->getArrayValue(),$kvs,$user);
//    }
//
    /** @var \Chatbox\SimpleKVS\SimpleKVS */
    protected $kvs;
    /** @var \Chatbox\Auth\UserInterface */
    protected $user;

    function __construct(SimpleKVS $kvs,UserInterface $user)
    {
        $this->kvs = $kvs;
        $this->user = $user;
    }

    /**
     * @param SimpleKVS $kvs
     * @return static
     */
    protected function newInstance(SimpleKVS $kvs){
        return new static($kvs,$this->user);
    }

    /**
     * @param $key
     * @return static
     */
    public function fetch($key){
        if( $kvs = $this->kvs->fetch($key) ){
            return $this->newInstance($kvs);
        }else{
            return null;
        }
    }

    /**
     * @param $data
     * @param null $key
     * @return static
     */
    public function publish(array $data,$key=null){
        if(is_null($key)){
            $key = Str::random(16);
        }
        $data = json_encode($data);
        $kvs = $this->kvs->set($key,$data);
        return $this->newInstance($kvs);
    }

    public function getKey(){
        return $this->kvs->getKey();
    }

    public function getValue(){
        return json_decode($this->kvs->getValue(),true);
    }

    abstract function accept(array $data);
}