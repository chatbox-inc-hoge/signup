<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Chatbox\Auth\Session;

use \Session;

class FuelphpSessionProvider {

    public function get($default=null){
        return Session::get("kbecAuth");
    }

    public function set($value){
        session_regenerate_id(true);
        Session::set("kbecAuth",$value);
    }
}