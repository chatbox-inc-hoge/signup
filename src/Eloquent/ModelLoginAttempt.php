<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/01
 * Time: 16:54
 */

namespace Chatbox\Auth\Eloquent;

class LoginAttempt extends \Illuminate\Database\Eloquent\Model{

    static public function check($loginKey,$time){
        $rows = static::where("login_key",$loginKey)->where("created_at" ,"<",time()-$time)->get();
        return count($rows);
    }

    static public function add($loginKey){
        static::create([
            "login_key" => $loginKey
        ]);
    }

    static public function reset($loginKey){
        $rows = static::where("login_key",$loginKey)->get();
        foreach($rows as $row){
            $row->delete();
        }
    }


    protected $table = "signup_login_attempt";
    protected $fillable = array('login_key');
}