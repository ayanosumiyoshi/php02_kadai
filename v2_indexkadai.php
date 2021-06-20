<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/index.css" rel="stylesheet">
</head>
<body>

<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] -->

<p>勤怠管理表</p>

<form method="POST" action="insertkadai.php">
  <table>
    <tr><th>名前</th><th>開始</th><th>終了</th></tr>
    <tr>
      <td>山田</td>
      <td><input type="time" name="start"><input type="submit" value="登録"></td>
      <td><input type="time" name="end"><input type="submit" value="登録"></td>
    </tr>
    <!-- <tr>
      <td>田中</td>
      <td><input type="time" name="tanaka_start"><input type="submit" value="登録"></td>
      <td><input type="time" name="tanaka_end"><input type="submit" value="登録"></td>
    </tr>
    <tr>
      <td>鈴木</td>
      <td><input type="time" name="suzuki_start"><input type="submit" value="登録"></td>
      <td><input type="time" name="suzuki_end"><input type="submit" value="登録"></td>
    </tr> -->
  </table>
</form>
<!-- Main[End] -->


</body>
</html>
