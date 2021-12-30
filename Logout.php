<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "タイムアウトしました。";
} else {
    $errorMessage = "ログアウトしました。";
}

// �Z�b�V�����̕ϐ��̃N���A
$_SESSION = array();

// �Z�b�V�����N���A
@session_destroy();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
<style>
body{text-align: center;}
</style>
    </head>
    <body>
        <h1>ログアウト</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>
