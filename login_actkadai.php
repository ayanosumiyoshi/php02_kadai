<?php
//最初にSESSIONを開始！！ココ大事！！Sessionを使うときには常にstartする
session_start();

//POST値
$lid = $_POST['lid'];//ID
$lpw = $_POST['lpw'];//パスワード

//1.  DB接続します
require_once('funcskadai.php');
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM workrecord_usertable WHERE lid = :lid AND lpw = :lpw");
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR); //* Hash化する場合はコメントアウトする
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
//* if(password_verify($lpw, $val["lpw"])){
// 1 HASH化していない場合↓
  if($val['id'] != ""){  //==は～だったら、!=は～でなかったら
// 2 HASH化している場合↓
  // if(password_verify($lpw, $val['lpw'])){
  //Login成功時
  $_SESSION['chk_ssid']  = session_id();//SESSION変数にidを保存
  $_SESSION['kanri_flg'] = $val['kanri_flg'];//SESSION変数に管理者権限のflagを保存
  $_SESSION['name']      = $val['name'];//SESSION変数にnameを保存
  redirect('indexkadai.php');
}else{
  //Login失敗時(Logout経由)
  echo '<script>if(confirm("IDもしくはパスワードに誤りがあります")){window.location.href="loginkadai.php";}</script>'; 
}

exit();


