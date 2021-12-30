<?php

$counter_file = 'counter.txt';
$counter_lenght = 8;

$fp = fopen($counter_file, 'r+');

if ($fp){
    if (flock($fp, LOCK_EX)){

        $counter = fgets($fp, $counter_lenght);
        $counter++;

        rewind($fp);

        if (fwrite($fp,  $counter) === FALSE){
            print('ファイル書き込みに失敗しました');
        }

        flock($fp, LOCK_UN);
    }
}

fclose($fp);

print('count:'.$counter);

//mkdir($counter);

//copy("syoki/keiji.php", "$counter/index.php");

touch("keiji-data/keiji-data-".$counter.".csv");
?>
<?php
session_start();

if(isset($_GET['message'])){

$category = $_GET['kind'];

if($category == "main"){
    $comment = $_GET['message'];
$a = fopen("./main.txt", "a");
@fwrite($a, "<a href=keiji.php?id=" . $counter . ">" . $comment . "</a> ");
fclose($a);
echo "<br />" . $comment;

}elseif($category == "game"){
    $comment = $_GET['message'];
$a = fopen("./game.txt", "a");
@fwrite($a, "<a href=keiji.php?id=" . $counter . ">" . $comment . "</a> ");
fclose($a);
echo "<br />" . $comment;

}elseif($category == "variety"){
    $comment = $_GET['message'];
$a = fopen("./variety.txt", "a");
@fwrite($a, "<a href=keiji.php?id=" . $counter . ">" . $comment . "</a> ");
fclose($a);
echo "<br />" . $comment;

}elseif($category == "sonota"){
    $comment = $_GET['message'];
$a = fopen("./sonota.txt", "a");
@fwrite($a, "<a href=keiji.php?id=" . $counter . ">" . $comment . "</a> ");
fclose($a);
echo "<br />" . $comment;
}
}
?>

<p></p>
<a href="index.php">戻る</a>
