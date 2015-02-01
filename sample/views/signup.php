<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SINGUP PAGE</title>
    <?=\Chatbox\CDN::fullset();?>
</head>
<body>
<?=\Chatbox\View::render(__DIR__."/_header.php");?>
<div class="container">
    <div class="page-header">
        <h1>Login Application Sample</h1>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <form action="/signup.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="checkbox"> ユーザ登録
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    <?= \Chatbox\View::render(__DIR__."/_footer.php");?>
</div>
</body>
</html>