<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Config\Config;
use Chatbox\Auth\Invitation;
use Chatbox\Auth\UserInterface;
use Chatbox\SimpleKVS\SimpleKVS;
use Chatbox\SimpleKVS\Driver\KVSDriverInterface;

class InvitationProvider {

    public function __invoke(Config $config,SimpleKVS $kvs,UserInterface $user)
    {
        $obj = new Invitation($kvs,$user);
        return $obj;
    }


}