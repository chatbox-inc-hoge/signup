<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN PAGE</title>
    <?=\Chatbox\CDN::fullset();?>
</head>
<body>
<?=\Chatbox\View::render(__DIR__."/_header.php");?>
<div class="container">
    <div class="page-header">
        <h1>Login Application Sample</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="/signin.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="checkbox"> Check me out
                    </label>
                </div>
                <input name="provider" value="password" type="hidden"/>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default" href="/signin.php?type=facebook">facebook</a>
            <a class="btn btn-default" href="/signin.php?type=twitter">twitter</a>
            <a class="btn btn-default" href="/signin.php?type=google">google</a>

        </div>
    </div>

    <?= \Chatbox\View::render(__DIR__."/_footer.php");?>

</div>
</body>
</html>