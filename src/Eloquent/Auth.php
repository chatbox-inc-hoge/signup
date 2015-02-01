<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/01
 * Time: 3:06
 */

namespace Chatbox\Auth\Eloquent;


class Auth extends \Illuminate\Database\Eloquent\Model{

    protected $table = "signup_auth";
    protected $fillable = array('key', 'user_id',"provider");
} 