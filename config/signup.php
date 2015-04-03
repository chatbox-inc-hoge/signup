<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/03/08
 * Time: 16:47
 */
use Chatbox\SimpleKVS\Driver\SimpleDB;

return [
    /**
     * [require] UserObject Instance
     */
    "user" => null,// User Object,
    "auth" => [
        "password" => "\\Chatbox\\Auth\\Driver\\Password",
        "token"    => "\\Chatbox\\Auth\\Driver\\Token",
    ],
    "invitation" => [
        "kvs" => new SimpleDB(["table" => "signup_tmp_invitation"]),
    ],
//    "serializer" => [
//        "session" => new \Chatbox\Auth\Serialize\SessionSerializer(),
//        "token" => new \Chatbox\Auth\Serialize\TokenSerializer(),
//    ]
];