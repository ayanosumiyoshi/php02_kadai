<?php
//insert.phpの処理を持ってくる
//1. POSTデータ取得
$name = $_POST['name'];
$date = $_POST['date'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$comment = $_POST['comment'];
$id = $_POST['id'];


//2. DB接続します
require_once('funcskadai.php');
$pdo = db_conn();

//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）
$stmt = $pdo->prepare(
    "UPDATE workrecord_timetable SET name=:name, date=:date, starttime=:starttime, endtime=:endtime, comment=:comment WHERE id=:id"
  );
  
  // 4. バインド変数を用意
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':date', $date, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':starttime', $starttime, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':endtime', $endtime, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  
  // 5. 実行
  $status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    //以下を関数化
    sql_error($stmt);
  }else{
    //５．リダイレクト
    //以下を関数化
    redirect('indexkadai.php');
  }