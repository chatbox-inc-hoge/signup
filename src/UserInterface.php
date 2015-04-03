<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Chatbox\Auth;

/**
 * メールアドレスと言うのは常に変わりうる情報で、
 * 認証フローにおいてはどうでもいい情報。
 */
interface UserInterface {

    /**
     * ユーザIDを返す。
     * @return mixed
     */
    public function signUpGetId();

    /**
     * ユーザIDからユーザ情報を特定する。
     * @return UserInterface
     */
    public function signUpFetchByID($userId);

    /**
     * 新しくユーザを生成する。
     * @param $data
     * @return UserInterface
     */
    public function signUpCreateUser($data);

} 