<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 20:14
 */

namespace Chatbox\Auth\Serialize;

use Chatbox\Auth\UserInterface;

interface SerializeInterface {

    /**
     * @param UserInterface $user
     * @return string fetch key
     */
    public function save(UserInterface $user);

    /**
     * @param null $key
     * @return UserInterface|null
     */
    public function load($key=null,$default=null);

    /**
     * @param UserInterface $user
     * @return string fetch key
     */
    public function reset(UserInterface $user);

    /**
     * @param null $key
     * @return UserInterface
     */
    public function delete($key=null);



} 