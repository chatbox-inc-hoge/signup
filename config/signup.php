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
    "kvs" => new SimpleDB(["table" => "signup_tmp_invitation"])
];