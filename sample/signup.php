<?php
/**
 * ユーザ新規登録画面
 */
require __DIR__ . "/_common.php";

$password = new \Chatbox\Auth\Providers\PasswordProvider([
    "credential" => ["password","email"]
]);

if( \Chatbox\Input::isMethod("POST")){
    $user = \Chatbox\Auth\User::create([
        "data" => json_encode($_POST)
    ]);
    $user->save();
    $password->bindUser($user);
    \Chatbox\HTTP::redirect("/");
}else{
    echo \Chatbox\View::render(__DIR__."/views/signup.php");
}