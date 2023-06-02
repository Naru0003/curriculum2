<?php
require_once('db_connect.php');
session_start();

if (!empty($_POST)) {
    if (empty($_POST["name"])) {
        $error_message = "名前が未入力です。";
    }
    if (empty($_POST["pass"])) {
        $error_message = "パスワードが未入力です。";
    }
    if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
        $pdo = connect();
        try {
          $sql = "SELECT * FROM users WHERE name = :name";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':name', $name);
          $stmt->execute();
      } catch (PDOException $e) {
          echo 'Error: ' . $e->getMessage();
          die();
      }
      if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          if (password_verify($pass, $row['password'])) {
              $_SESSION["user_id"] = $row['id'];
              $_SESSION["user_name"] = $row['name'];
              header("Location: bookList.php");
              exit;
          } else {
            $error_message = "パスワードに誤りがあります。";
          }
      } else {
        $error_message = "ユーザー名かパスワードに誤りがあります。";
      }
  }
}
?>
<!doctype html>
<html lang="ja">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <link rel="stylesheet" href="style.css">
      <title>ログインページ</title>
  </head>
  <body class="login-page">
      <h1>ログイン画面</h1>
      <input type="button" onclick="location.href='signUp.php'" value="新規ユーザー登録" class="login-button">
      <form method="post" action="">
          <input type="text" name="name" size="15"  placeholder="ユーザー名"><br><br>
          <input type="text" name="pass" size="15" placeholder="パスワード"><br><br>
          <input type="submit" value="ログイン" class="submit-button">
      </form>
      <?php
// エラーメッセージの表示
if (!empty($error_message)) {
  echo "<p class='error-message'>$error_message</p>";
}
?>
  </body>
</html>
