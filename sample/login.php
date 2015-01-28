<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/18
 * Time: 18:15
 */
require __DIR__ . "/../vendor/autoload.php";
session_start();
if($_SESSION["HTTP_METHODS"] === "POST"){

    http_redirect("/mypage");
}else{
    echo \Chatbox\View::render(__DIR__."/views/login.php");
}