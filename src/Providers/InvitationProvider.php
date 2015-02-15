<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Arr;

class InvitationProvider implements \Pimple\ServiceProviderInterface{
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
        $pimple["invitation.kvs"] = function($pimple){
            $simpleDB = new \Chatbox\SimpleKVS\Driver\SimpleDB([
                "table"=>Arr::get($pimple["config"],"invitation.table","signup_tmp_invitation"),
                "database" => Arr::get($pimple["config"],"database",null)
            ]);
            return new \Chatbox\SimpleKVS\SimpleKVS($simpleDB);
        };
        $pimple["invitation.create"] = $pimple->protect(function($data)use($pimple){
            return new \Chatbox\Auth\Invitation($data,$pimple["invitation.kvs"],$pimple["user"]);
        });
        $pimple["invitation.load"] = $pimple->protect(function($key)use($pimple){
            return \Chatbox\Auth\Invitation::load($key,$pimple["invitation.kvs"],$pimple["user"]);
        });
    }


}