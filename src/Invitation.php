<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/13
 * Time: 11:23
 */

namespace Chatbox\Auth;

class Invitation extends Util\Envelope{

    /**
     * @param array $data
     * @return UserInterface
     */
    public function accept(array $data=[]){
        $data = array_merge($this->data,$data);
        return $this->user->signUpCreateUser($data);
    }
}