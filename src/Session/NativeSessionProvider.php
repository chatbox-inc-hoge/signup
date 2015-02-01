<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Chatbox\Auth\Session;

class NativeSessionProvider {

    function __construct(){
        session_start();
    }


    public function get($default=null){
        return (isset($_SESSION["kbecAuth"]))?$_SESSION["kbecAuth"]:$default;
    }

    public function set($value){
        session_regenerate_id(true);
        $_SESSION["kbecAuth"] = $value;
    }
}