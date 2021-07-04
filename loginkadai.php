<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="css/index.css">
<head>
  <meta charset="UTF-8">
  <title>Marindows - ログイン</title>
</head>

<body>
<div class="title_picture">
  <img src="img/background_color.PNG" alt="background" width="100%">
</div>
<!-- 入力部分 -->

<div class="page_title text_center">
  <p>Marindows  勤怠管理</p>
</div>

<div class="marindows_logo">
  <p>Marindows</p>
</div>

<div class="text_center">
<p>勤怠登録するにはログインしてください</p>
</div>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_actkadai.php" method="post" class="text_center">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>


</body>

<footer>
    <p class="footer text_center">
        Copyright © 2021 Mitsubishi Innovation Lab All Rights Reserved.
    </p>

</footer>

</html>