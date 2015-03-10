<?php
use Chatbox\Auth\SignUp;

$config = SignUp::config();
$signUp = new SignUp($config);

SignUp::setInstance($signUp);

## ユーザの作成

//ユーザの作成はUserInterfaceが賄う。

$user = SignUp::getInstance()->user();

$newUser = $user->signUpCreateUser($data);


## 招待状の送信処理

//招待状の作成
$inv = SignUp::getInstance()->invitation();
$inv = $inv->publish($userData);
echo $inv->getKey(); // key

// [別リクエスト] 招待状の読み込み
$inv = $inv->fetch($key);
$inv->getKey();
$newUser = $user->signUpCreateUser($inv->getValue());//ユーザの作成

## 認証情報とのヒモ付

$newUser = $user->signUpCreateUser($inv->getValue());//ユーザの作成

$passAuth = SignUp::getInstance()->auth("password");
$passAuth->bind($newUser,$cred); // ユーザの作成

## 認証

$passAuth = SignUp::getInstance()->auth("password");
$user = $passAuth->getUser($cred);

## 認証情報の永続化

$remember = SignUp::getInstance()->remember("session");
$remember->save($user);

// [別リクエスト] ユーザ情報の読み込み

$user = $remember->load($key); // credとは別の情報で時限簡易認証(Sessionなどの場合はKEY不要)




