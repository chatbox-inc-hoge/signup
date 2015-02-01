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
            <?php var_dump($user);?>
            <?php var_dump($user->toArray());?>
        </div>
    </div>
    <?= \Chatbox\View::render(__DIR__."/_footer.php");?>
</div>
</body>
</html>