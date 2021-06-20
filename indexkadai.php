<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="css/index.css">
<head>
  <meta charset="UTF-8">
  <title>勤怠登録</title>
</head>

<body>
<div class="title_picture">
  <img src="img/background_color.PNG" alt="background" width="100%">
</div>
<!-- 入力部分 -->

<div class="page_title text_center">
  <p>勤怠管理</p>
</div>

<div class="marindows_logo">
  <p>Marindows</p>
</div>

<form method="POST" action="insertkadai.php">
  <div class="text_center">
     名前
      <select name="name">
        <option value="山田">山田</option>
        <option value="田中">田中</option>
        <option value="鈴木">鈴木</option>
      </select> 
     日付<input type="date" name="date"></日付：>
     勤務開始<input type="time" name="starttime"></勤務開始：>
     勤務終了<input type="time" name="endtime"></勤務終了：>
     報告事項<textArea name="comment" rows="1" cols="40"></textArea>
     <input type="submit" value="送信">
  </div>
</form>

<!-- 出力部分 -->
<?php


//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=workrecord_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM workrecord_timetable WHERE name = '山田'");
//3. 実行
$status = $stmt->execute();
//4．データ表示
$yamada="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $yamada .= "<p>";
    $yamada .= $result['name'].'／'.$result['date'].'／'.$result['starttime'].'／'.$result['endtime'].'('.$result['endtime-starttime'].')';
    $yamada .= "</p>";
  }
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM workrecord_timetable WHERE name = '田中'");
//3. 実行
$status = $stmt->execute();
//4．データ表示
$tanaka="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $tanaka .= "<p>";
    $tanaka .= $result['name'].'／'.$result['date'].'／'.$result['starttime'].'／'.$result['endtime'];
    $tanaka .= "</p>";
  }
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM workrecord_timetable WHERE name = '鈴木'");
//3. 実行
$status = $stmt->execute();
//4．データ表示
$suzuki="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $suzuki .= "<p>";
    $suzuki .= $result['name'].'／'.$result['date'].'／'.$result['starttime'].'／'.$result['endtime'];
    $suzuki .= "</p>";
  }
}

?>

<!-- 表示部分 -->
 <p class="text_center">6月実績</p>
 <div class="text_center">
  <table  border="1" style="border-collapse: collapse">
  <tr><th>山田</th><th>田中</th><th>鈴木</th></tr>
  <tr><td><?=$yamada?></td><td><?=$tanaka?></td><td><?=$suzuki?></td></tr>
  </table>
 </div>

</body>
</html>