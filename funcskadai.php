<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。

//提出用
// function db_conn()
// {
//     try {
//         $db_name = "gsgsgs_ayano1";    //データベース名
//         $db_id   = "gsgsgs";      //アカウント名
//         $db_pw   = "gsgsgsgs2021";      //パスワード：XAMPPはパスワード無しに修正してください。
//         $db_host = "mysql57.gsgsgs.sakura.ne.jp"; //DBホスト
//         $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
//         return $pdo;//ここを追加！！
//     } catch (PDOException $e) {
//         exit('DB Connection Error:' . $e->getMessage());
//     }
// }

//自分のDB用
function db_conn(){
    try {
        //Password:MAMP='root',XAMPP=''
        $pdo = new PDO('mysql:dbname=workrecord_db;charset=utf8;host=localhost','root','root');
        return $pdo;
      } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
      }
}

//SQLエラー関数：sql_error($stmt)

function sql_error($stmt){
        $error = $stmt->errorInfo();
        exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//ログインチェック
function loginCheck(){
    if( $_SESSION["chk_ssid"] != session_id() ){
      exit('LOGIN ERROR');
    }else{
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
    }
  }