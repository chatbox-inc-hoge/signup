<?php
namespace Chatbox\Auth\Providers;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:56
 */
use Chatbox\Config\Config;
use Chatbox\Auth\Serialize\SessionSerializer;
use Chatbox\Auth\Serialize\TokenSerializer;


class SerializerProvider{

    public function __invoke(Config $config)
    {
        $arr = [];
        $arr["session"] = new SessionSerializer();
        $arr["token"] = new TokenSerializer();
        return $arr;
    }


}