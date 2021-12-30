<?php if(isset($_GET['id'])) { $id = $_GET['id']; } ?>
<?php
/* 手続き型版 */
$name=filter_input(INPUT_POST,'text');

$body = $name; //チェックしたい本文
$ng_words = array('死ね','消えろ','バカ'); //禁止ワード
$flg = 0;
foreach( $ng_words as $word ){
    if(strpos($body, $word) !== false){
        $flg = 1;
        break;
    }
}
if( $flg ){
        header('Location: ng.php');
}else{
    function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

session_start(); // 1

$name = (string)filter_input(INPUT_POST, 'name'); 
$text = (string)filter_input(INPUT_POST, 'text');
$token = (string)filter_input(INPUT_POST, 'token'); // 3

$fp = fopen("keiji-data/keiji-data-".$id.".csv", 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && sha1(session_id()) === $token) { // 3
    flock($fp, LOCK_EX);
    fputcsv($fp, [$name, $text]);
    rewind($fp);
    header("Location: keiji.php?id=".$id);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);
}
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>掲示板</title>
<style>
    .scroll {
    margin     : auto;
    width      : 96%;
    font-size  : 140%;
    line-height: 1.5em;
    text-align : left;
    border     : 1px solid #666;
    color      : #000000;
    background : #fff;
    overflow   : hidden;
  }
  .scroll span{
    display     : inline-block;
    white-space : nowrap;
    line-height : 1em;
    animation   : scrollAnime 3s linear infinite alternate;
  }
  @keyframes scrollAnime{
      0% {
          margin-left: 100%;
          transform  : translateX(-100%)
         }
    100% {
          margin-left: 0;
          transform  : translateX(0)
         }
  }
  
  header {
    display: flex;
    width: 100%;
    height: 100px;
    background-color: darkgrey;
    align-items: center;
    position: fixed;
  }
  .main{
    padding: 130px 0px;
    height: 500px;
    text-align: center;
  }
  
  .title {
    margin-right: auto;
  }
   
  .menu-item {
    list-style: none;
    display: inline-block;
    padding: 10px;
  }
  </style>
<?php include('./menu.php'); ?>
<div class="main">
<h1>掲示板</h1>
<a href="index.php">ホームに戻る</a>
<a href="#toukoubasyo"><p>下に移動</p></a>
<section>
    <h2>投稿一覧</h2>
<?php if (!empty($rows)): ?>
    <ul>
<?php foreach ($rows as $row): ?>
        <li><?=h($row[1])?> (<?=h($row[0])?>)</li>
<?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>投稿はまだありません</p>
<?php endif; ?>
</section>
<section id="toukoubasyo">
    <h2>新規投稿</h2>
    <form action="" method="post">
        名前: <input type="text" name="name" value=""><br>
        本文: <input type="text" name="text" value=""><br>
        <button type="submit">投稿</button>
        <input type="hidden" name="token" value="<?=h(sha1(session_id())) /*2*/ ?>">
    </form>
<script>
function check_word( text ){
    var ng = ['死ね', 'バカ'];
    for( key in ng ){
        if( check_data.indexOf(ng[key]) != -1 ){
                  document.location.href = "ng.php"; //禁止ワードが含まれている場合
        }
    }
    return true;
}
</script>
</section>
</div>
