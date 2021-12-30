<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: keiji-error.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>山谷？？掲示板</title>
<style type="text/css">
body{
  text-align: center;
}

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
<script>
$(function() {
    $(function() {
        $('#submit').attr('disabled', 'disabled'); //?
            $('#chkbox').click(function() { //?
            if ( $(this).prop('checked') == false ) {　//?
                $('#submit').attr('disabled', 'disabled');　//?
            } else {
                $('#submit').removeAttr('disabled');　//?
            }
        });
    });
});
</script>
   </head>
   <body>
   <?php include 'menu.php';?>
<div class="main">
<h3>新規スレッド作成</h3>
<form action="keijisakusei.php" method="get">
     スレッドの名前 :<input type="text" name="message"><br>
<dl>
    <dt>
    <label for="kind">種類</label>
    </dt>
    <dd>
    <select name="kind">
    <option value="main">メイン（雑談系）</option>
    <option value="game">ゲーム</option>
    <option value="variety">バラエティ</option>
    <option value="sonota">その他</option>
</select>
    </dd>
</dl>
<p>スレッド名を書きました。
<input type="checkbox" name="agree_privacy" id="agree" value="" required="required" /></p>
      <input type="submit" value="送信">
    </form>
