<?php
namespace Chatbox\Auth;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/31
 * Time: 17:15
 */
require __DIR__ . "/_common.php";

$auth = Auth::native();

$user = $auth->loadSession();

echo \Chatbox\View::render(__DIR__."/views/mypage.php",["user"=>$user]);