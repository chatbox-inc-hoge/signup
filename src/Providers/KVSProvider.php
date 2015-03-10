<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Config\Config;
use Chatbox\SimpleKVS\SimpleKVS;
use Chatbox\SimpleKVS\Driver\KVSDriverInterface;

class KVSProvider {

    public function __invoke(Config $config)
    {
        $kvs = $config->get("kvs");
        if(! $kvs instanceof KVSDriverInterface){
            throw new \DomainException("configuration invalid. kvs must implemented KVS DRIVERINTERFACE");
        }
        return new SimpleKVS($kvs);
    }

}