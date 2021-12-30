<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ã‚¿ã‚¤ãƒ ã‚¢ã‚¦ãƒˆã—ã¾ã—ãŸã€‚";
} else {
    $errorMessage = "ãƒ­ã‚°ã‚¢ã‚¦ãƒˆã—ã¾ã—ãŸã€‚";
}

// ƒZƒbƒVƒ‡ƒ“‚Ì•Ï”‚ÌƒNƒŠƒA
$_SESSION = array();

// ƒZƒbƒVƒ‡ƒ“ƒNƒŠƒA
@session_destroy();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ãƒ­ã‚°ã‚¢ã‚¦ãƒˆ</title>
<style>
body{text-align: center;}
</style>
    </head>
    <body>
        <h1>ãƒ­ã‚°ã‚¢ã‚¦ãƒˆ</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <ul>
            <li><a href="index.php">æˆ»ã‚‹</a></li>
        </ul>
    </body>
</html>
