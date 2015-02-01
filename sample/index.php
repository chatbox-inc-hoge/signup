<?php
namespace Chatbox\Auth;
/**
 * ログイン画面
 */
require __DIR__ . "/_common.php";

$auth = Auth::native();

if($user = $auth->loadSession()){
    \Chatbox\HTTP::redirect("/mypage.php");
}else{
    echo \Chatbox\View::render(__DIR__."/views/signin.php");
}



