<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>掲示板</title>
<style type="text/css">
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

* {
  box-sizing: border-box;
}
    
ul,
li {
  padding: 0;
  margin: 0;
}

li {
  list-style: none;
}

.tab {
  width: 100%;
  max-width: 100%;
  margin: auto;
  height: 1000px;
}

.tab-menu {
  display: flex;
}

.tab-item {
  text-align: center;
  padding: 10px 0;
  cursor: pointer;
  
  /* widthを同じ比率で分けあう */
  flex-grow: 1;

  /* 下線以外をつける */
  border: 1px solid skyblue;
}
    
.tab-item:not(:first-child) {
  border-left: none;
}

/* アクティブなタブはデザインを変えて選択中であることが解るようにする */
.tab-item.active {
  background: darkgrey;
  color: black;
}

.tab-box {
  height: 200px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-top: 1px solid;
}
    
/* コンテンツは原則非表示 */
.tab-content {
  display: none;
}

/* .showがついたコンテンツのみ表示 */
.tab-content.show {
  display: block;
}
</style>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.0.3.js"></script>
<script>
$(function() {
  $('.tab-item').click(function() {

    //現在activeが付いているクラスからactiveを外す
    $('.active').removeClass('active');

    //クリックされたタブメニューにactiveクラスを付与。
    $(this).addClass('active');

    //一旦showクラスを外す
    $('.show').removeClass('show');

    //クリックしたタブのインデックス番号取得
    const index = $(this).index();

    //タブのインデックス番号と同じコンテンツにshowクラスをつけて表示する
    $('.tab-content').eq(index).addClass('show');
  });
});
</script>
   </head>
   <body>
   <?php include 'menu.php';?>
<div class="main">
<h3>同時に投稿したら遅くなる可能性はありますがお待ちください</h3>
<h3>新規にスレッドを立てるにはログインをしてください</h3>
<script>
function test(){
  var a = document.documentElement;
  var y = a.scrollHeight - a.clientHeight;
  window.scroll(0, y);
}
</script>
<h3>カテゴリ</h3>
<div class="tab">
 
  <!--  タブメニュー  -->
  <ul class="tab-menu">
    <li class="tab-item active">メイン（雑談系）</li>
    <li class="tab-item">ゲーム系</li>
    <li class="tab-item">バラエティ</li>
     <li class="tab-item">その他</li>
  </ul><!-- /.tab_menu -->
  <p></p>
  <!--  コンテンツ  -->
  <div class="tab-box">
    <div class="tab-content show"><?php include('main.txt'); ?></div>
    <div class="tab-content"><?php include('game.txt'); ?></div>
    <div class="tab-content"><?php include('variety.txt'); ?></div>
    <div class="tab-content"><?php include('sonota.txt'); ?></div>
  </div>
</div>
