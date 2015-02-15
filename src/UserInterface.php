<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Chatbox\Auth;

/**
getId : 識別子
checkCred : 認証識別子のチェック方法を決める
getCred : パスワードリセット時に返すべき情報のまとめ
isLoginable : ログイン可能か決める。通常常にtrueだがbanやactivatedを実装するときはその限りでない。
 *
 * @package Wap
 */
interface UserInterface {

    /**
     * 一意のユーザ識別子を返す。
     * @return mixed
     */
    public function signUpGetId();
    /**
     * 一意のメールアドレスを返す。
     * @return mixed
     */
    public function signUpGetMail();

    /**
     * 一意のユーザ識別子からユーザオブジェクトを取得する。
     * @return UserInterface
     */
    public function signUpFetchById($id);

    /**
     * @param $data
     * @return UserInterface
     */
    public function signUpSave($data);

} 