<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Chatbox\Auth;

/**
 * ユーザオブジェクトのインターフェイス
 * 人口IDは、検索で使われない。基本検索はMailアドレスで行う。
 * Mailアドレスは、変わりうる。キャッシュされた識別情報から認証情報の乗っ取りが可能?
 * (ひも付き認証情報を全て削除すれば問題ないかも:ひも付き認証情報を削除可能かという問題)
getId : 識別子
checkCred : 認証識別子のチェック方法を決める
getCred : パスワードリセット時に返すべき情報のまとめ
isLoginable : ログイン可能か決める。通常常にtrueだがbanやactivatedを実装するときはその限りでない。
 *
 */
interface UserInterface {

    /**
     * ユーザIDを返す。
     * @return mixed
     */
    public function signUpGetId();
    /**
     * ユーザのメールアドレスを返す。
     * @return mixed
     */
    public function signUpGetMail();

    /**
     * ユーザIDからユーザ情報を特定する。
     * @return UserInterface
     */
    public function signUpFetchByID($mail);

    /**
     * 新しくユーザを生成する。
     * @param $data
     * @return UserInterface
     */
    public function signUpCreateUser($data);

} 