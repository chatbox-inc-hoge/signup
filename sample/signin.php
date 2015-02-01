<?php
namespace Chatbox\Auth;
/**
 * ログイン処理
 * リダイレクトオンリー
 */
require __DIR__ . "/_common.php";

$provider = new \Chatbox\Auth\Providers\PasswordProvider([
    "credential" => ["password","email"]
]);

$auth = Auth::native();

$user = new User();
$authenUser = $provider->getUser($user);

$auth->signin($authenUser);

\Chatbox\HTTP::redirect("/mypage.php");

