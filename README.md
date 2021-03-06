# 認証用ライブラリ

## 構成

基本ユーザオブジェクトのファクトリとして働く。

- [invitation] ユーザデータの新規登録

- [reminder] ユーザ認証情報のリセット

- [serializer] ユーザ情報の永続化。セッションやトークンなど

- [loader] 永続化されたユーザ情報のロード

- セッションの抽象化はなし。

### 作業めも

セッション永続化まで完了

続きトークン永続化へ

pimpleへのセット&取り出し


### セットアップ

````
$signUp = new SignUp;
````

### Auth

````

$passwordAuth = $signUp->authProvider("password");
$user = $passwordAuth->getUser($cred);

````

### invitation

ユーザデータの作成

````
$inv = $signUp->newInvitation($mail,$data);

$inv->publish();

$inv = $signUp->loadInvitation($key);

$email = $inv->getMailAdress();
$hoge = $inv->get("hoge");//get $data["hoge"]

$user = $signUp->accept($inv);

$passwordAuth->bind($user,$cred);
````

### 永続化

````
$serializer = $signUp->serializeProvider("session");

$key = $serializer->save($user); //セッションエントリキーやトークンなど

$user = $serializer->load($key);

$serializer->reset($user);

````

### Reminder

````

$reminder = new Reminder($user);

$reminder->publish();

$reminder = Reminder::load($key);

$signUp->accept($reminder)

````




## 利点

ユーザオブジェクトなどアプリケーションロジックに関わる部分の独立性は維持しつつも、
トークンやログイン試行回数制限、セッション埋め込みなどの処理を賄う。

### 主な機能

- セッション処理: セッションマネージャを差し込むことでセッション処理を担当
- ログイン試行回数制限: ログイン試行回数を自動的に記録して云々
- ソーシャルログイン機能: ソーシャルアカウントとユーザIDを紐付けてあれする(hybridAuthのラッパー)。

## kbec オブジェクトのインターフェイス

### auth
セッションからログイン状態を読み取ってユーザオブジェクトを取得する。

### login
httpパラメータからログイン情報をうけとり、検証し、ユーザオブジェクトを生成してセッションに保存する。




## 認証処理とは...

- 認証情報をPOSTとかSESSIONから受け取る
- 認証情報をユーザオブジェクト生成用のPKに変換する。
− ユーザ識別子からユーザオブジェクトを生成する。

### 認証情報

− トークン
− ソーシャルID
− ID & パスワード
− セッション埋込キー

### 永続化のための処理

− ユーザは繰り返し使用可能な継続認証情報を持っているため、特別な処理は不要(再ログイン形式)
− 毎回認証情報を送信させる処理が手間なため、セッションやクッキーにキーを埋め込んで省略ログイン可能なように計らう。

## Usage

````
$wap = new \Wap\Wap($credLoaders,$userFactory);
// or use configuration
$wap = \Wap\Wap::forge();

$user = $wap->login();

// to seiralize
$wap->setSession();
````

## トークン処理

毎回認証情報を生でやりとりし続けるのがアレ、とか言う理由で発行されるトークン系の処理。

− 第一回目で重た目の認証手続きが取られる。
− 認証手続きが成功したらトークンを発行して、トークン情報を返送する。
− トークンで二回目の簡便な認証処理を行う。
− トークンは利用される度に、利用日時を更新する。

− 送られてきたトークンが有効期限切れの場合でトークン再発行期間内の場合、新しいトークンを返送する。

````
$wap = new \Wap\Wap();
$user = $wap->login();//重た目の認証

if($wap->getLoginType($user) === $socialCredLoader){
    $token = $wap->publishToken()
    $response->setToken($token);
}else if($wap->getLoginType($user) === $socialCredLoader && $wap($expired)){
    $response->setToken($wap->rePublishToken);
}
// to seiralize
$wap->setSession();
````

## UserInterface

findByPk($pk) : プライマリーキーからオブジェクトを生成する。

getId : 識別子
checkCred : 認証識別子のチェック方法を決める
getCred : パスワードリセット時に返すべき情報のまとめ
isLoginable : ログイン可能か決める。通常常にtrueだがbanやactivatedを実装するときはその限りでない。


## Sentryのインターフェイス

credベースのログインと、userオブジェクトベースのログイン

ログインという処理は単なるuserオブジェクトのファクトリではなく、
パスワードリセットフィールドやログイン試行ログの消去を兼ねている。

その他、Sentryにはuserのfindエントリやlogoutエントリ、userオブジェクトを用いたcheck機構がある

### check

ソシャゲとかで、statusとかのデータAPIを叩いた時に
認証ユーザ(自分の)の情報か他人の情報か観るときとかに使うっぽい


## 認証という機能について考える

− ユーザオブジェクトのファクトリ
  − 試行回数の制御
  − cred情報の
