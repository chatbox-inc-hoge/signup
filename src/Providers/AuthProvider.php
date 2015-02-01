<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/31
 * Time: 1:39
 */

namespace Chatbox\Auth\Providers;

use Chatbox\Auth\UserInterface;
use Chatbox\Auth\Eloquent\Auth as Model;
use Chatbox\Auth\Exceptions\InvalidAuthKeyException;
use Chatbox\Auth\Exceptions\UserNotFoundException;


class AuthProvider {

    protected $type;

    function __construct(array $config=[])
    {
        $this->configure($config);
        if(!$this->type){
            throw new \Exception("you should set provider name");
        }
    }

    protected function configure(array $config){
        // do any initialization here;
    }

    protected function getCredential()
    {
        // return credential infomation;
    }
    /**
     * @return UserInterface
     * @throws \Exception
     */
    public function getUser(UserInterface $user){
        $userAuth = Model::where([
            "provider"=>$this->type,
            "key"=>$this->getCredential()
        ])->first();
        if(is_null($userAuth))
        {//ユーザIDを特定できなかった場合
            throw new InvalidAuthKeyException("no user found");
        }
        $authenUser = $user->fetchById($userAuth->user_id);
        if(is_null($authenUser))
        {//ユーザIDから紐づくユーザを見つけられなかった場合
            throw new UserNotFoundException("no valid user found:{$userAuth->user_id}");
        }
        return $authenUser;
    }

    /**
     * @return UserInterface
     * @throws \Exception
     */
    public function bindUser(UserInterface $user){
        $userAuth = Model::create([
            "user_id" => $user->getId(),
            "key" => $this->getCredential(),
            "provider" => $this->type,
        ]);
        return $user;
    }
}