<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 18:55
 */

namespace Chatbox\Auth\Driver;

use Chatbox\Auth\UserInterface;
/**
 *
 * @package Chatbox\Auth\Driver
 */
interface AuthDriverInterface {

    public function __construct(UserInterface $user);

    public function getUser($cred);

    public function bind(UserInterface $user,$cred);

} 