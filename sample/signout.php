<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/18
 * Time: 18:15
 */
require __DIR__ . "/../vendor/autoload.php";
session_start();
session_destroy();
\Chatbox\HTTP::redirect("/");
?>