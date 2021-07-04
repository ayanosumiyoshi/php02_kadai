<?php

//SESSIONスタート
session_start();

//select.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)

require_once('funcskadai.php');
$pdo = db_conn();

//ログインチェック
loginCheck();
$user_name = $_SESSION['name'];
//echo $user_name;
//以下ログインユーザーのみ

//2.対象のIDを取得
$id = $_GET["id"];
// echo $id; URLに入っているidをもってきている。echoを入れることで受け取れているか確認

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM workrecord_timetable WHERE id = :id");
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch(); 
}

?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="css/index.css">
<head>
  <meta charset="UTF-8">
  <title>Marindows - 勤怠登録（修正）</title>
</head>

<body>
<div class="title_picture">
  <img src="img/background_color.PNG" alt="background" width="100%">
</div>
<!-- 入力部分 -->

<div class="page_title text_center">
  <p>Marindows  勤怠管理（修正）</p>
</div>

<div class="marindows_logo">
  <p>Marindows</p>
</div>

<form method="POST" action="updatekadai.php">
  <div class="text_center">
     名前 <input type="text" name="name" value="<?= $result['name']?>"></名前：>
     日付<input type="date" name="date" value="<?= $result['date']?>"></日付：>
     勤務開始<input type="time" name="starttime" value="<?= $result['starttime']?>"></勤務開始：>
     勤務終了<input type="time" name="endtime" value="<?= $result['endtime']?>"></勤務終了：>
     報告事項<textArea name="comment" rows="1" cols="40" value="<?= $result['comment']?>"></textArea>
     <input type="hidden" name="id" value="<?= $result['id']?>">
     <input type="submit" value="修正">
  </div>

<div class="text_center back_button">
 <a href="indexkadai.php">勤怠管理表に戻る</a>
</div>

</body>

<footer>
    <p class="footer text_center">
        Copyright © 2021 Mitsubishi Innovation Lab All Rights Reserved.
    </p>

</footer>

</html>
