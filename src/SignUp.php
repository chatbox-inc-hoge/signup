<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:47
 */

namespace Chatbox\Auth;

/**
 * Class SignUp
 *
 * invitation [protected]
 * invitation_kvs
 *
 *
 * @package Chatbox\Auth
 */
class SignUp {

    protected $pimple;

    function __construct(array $config)
    {
        $pimple = new \Pimple\Container([
            "config" => $config
        ]);

        $pimple->register(new Providers\UserObjectProvider());
        $pimple->register(new Providers\InvitationProvider());
        $pimple->register(new Providers\AuthDriverProvider());
        $pimple->register(new Providers\SerializerProvider());
        $this->pimple = $pimple;
    }

//    protected function defaultConfig(){
//        return [
//        ];
//    }

    /**
     * @param $type
     * @return Driver\AuthDriverInterface
     */
    public function authProvider($type){
        return $this->pimple["driver.$type"];
    }
    /**
     * @param $type
     * @return Serialize\SerializeInterface
     */
    public function serializeProvider($type){
        return $this->pimple["serialize.$type"];
    }
    /**
     * @param $email
     * @param array $data
     * @return Invitation
     */
    public function newInvitation(array $data){
        return $this->pimple["invitation.create"]($data);

    }

    /**
     * @param $code
     * @return Invitation
     */
    public function loadInvitation($code){
        return $this->pimple["invitation.load"]($code);
    }


} 