<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/31
 * Time: 1:35
 */

namespace Chatbox\Auth;


class Auth {

    /**
     * @return Auth
     */
    static public function native(){
        return new static(new \Chatbox\Auth\Session\NativeSessionProvider());
    }


    /**
     * @var Session\AuthSessionProvider
     */
    protected $sessionProvider;

    function __construct(Session\AuthSessionProvider $sessionProvider)
    {
        $this->sessionProvider = $sessionProvider;
    }

    /**
     * セッションから認証情報を取得する
     * @return UserInterface
     */
    public function loadSession(){
        $user = $this->sessionProvider->get();
        return $user;
    }

    /**
     * ユーザを探してログインセッションにねじ込む
     * なかったら諦める。
     *
     * @param AuthProvider $authProvider
     */
    public function signin(UserInterface $user){
        $this->sessionProvider->set($user);
    }

//    /**
//     * ユーザが存在しないテイで、ユーザを作成し、
//     * 新規にログインセッションを始める。
//     * @param AuthProvider $authProvider
//     */
//    public function signup(AuthProvider $authProvider){
//        $user = $authProvider->createUser();
//        $this->sessionProvider->set($user);
//        return $user;
//    }
//


} 