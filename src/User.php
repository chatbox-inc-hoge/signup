<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/02/01
 * Time: 3:18
 */

namespace Chatbox\Auth;


class User extends \Illuminate\Database\Eloquent\Model implements UserInterface{

    protected $table = "tb_user";

    protected $fillable = array('data');
    /**
     * 一意のユーザ識別子を返す。
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 一意のユーザ識別子からユーザオブジェクトを取得する。
     * @return UserInterface
     */
    public function fetchById($id)
    {
        return $this->find($id);
    }

}