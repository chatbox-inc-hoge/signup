<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/01
 * Time: 3:06
 */

namespace Chatbox\Auth\Eloquent;


class Auth extends \Illuminate\Database\Eloquent\Model{

    static public function entry($userId,$key,$provider){
        return static::create([
            "key" => $key,
            "user_id" => $userId,
            "provider" => $provider
        ]);
    }

    protected $table = "signup_auth";
    protected $fillable = array('provider','key', 'user_id');


} 