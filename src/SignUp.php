<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:47
 */

namespace Chatbox\Auth;

use Chatbox\Arr;
use Chatbox\Config\Config;
use Chatbox\Box\Box;
use Chatbox\Auth\Providers\UserObjectProvider;
use Chatbox\Auth\Providers\KVSProvider;
use Chatbox\Auth\Providers\InvitationProvider;
use Chatbox\Auth\Providers\AuthDriverProvider;
use Chatbox\Auth\Providers\SerializerProvider;

use Chatbox\Traits\InstanceManager;

/**
 * Class SignUp
 *
 * invitation [protected]
 * invitation_kvs
 *
 *
 * @package Chatbox\Auth
 */
class SignUp extends Box{

    use InstanceManager;

    static public function config(){
//        $config = new Config();
        $config = Config::forge();
        $config->load(__DIR__."/../config/signup.php");
        return $config;
    }

    private $config;

    public function __construct(Config $config){
        $this->config = $config;
        $this->configure();
    }

    public function configure()
    {
        parent::configure();
        $this->register("user",["config"],new UserObjectProvider());
        $this->register("kvs",["config"],new KVSProvider());
        $this->register("invitation",["config","kvs","user"],new InvitationProvider());
        $this->register("auth",["config","user"],new AuthDriverProvider());
        $this->register("serializer",["config"],new SerializerProvider());
        $this->register("config",[],function(){
            return $this->config;
        });
    }

    /**
     * @param $type
     * @return UserInterface
     */
    public function user(){
        $user = $this->getService("user");
        return $user;
    }
    /**
     * @param $type
     * @return Driver\AuthDriverInterface
     */
    public function auth($type){
        $arr = $this->getService("auth");
        if($auth = Arr::get($arr,$type)){
            return $auth;
        }else{
            throw new \DomainException("non exist service to be fetch");
        }
    }
    /**
     * @param $type
     * @return Serialize\SerializeInterface
     */
    public function remember($type){
        $arr = $this->getService("serializer");
        if($auth = Arr::get($arr,$type)){
            return $auth;
        }else{
            throw new \DomainException("non exist service to be fetch");
        }
    }

    /**
     * @return Invitation
     */
    public function invitation(){
        return $this->getService("invitation");
    }


    /**
     * @param $email
     * @param array $data
     * @return Invitation
     * @deprecated
     */
    public function newInvitation(array $data){
        return $this->pimple["invitation.create"]($data);

    }

    /**
     * @param $code
     * @return Invitation
     * @deprecated
     */
    public function loadInvitation($code){
        return $this->pimple["invitation.load"]($code);
    }


} 