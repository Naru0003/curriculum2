<?php

require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['name']) && isset($_POST['password'])) {
    try {
      $pdo = connect();
      $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
      $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':name', $_POST['name']);
      $stmt->bindParam(':password', $hashedPassword);
      $stmt->execute();
      echo "登録が完了しました。";
      }catch (PDOException $e) {
      echo "エラーが発生しました。";
      exit;
    }
  }
}
?>




<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>ユーザー登録画面</h1>
<form method="POST" action="">
<input type="text" name="name" id="name" placeholder="ユーザー名">
<br><br>
<input type="password" name="pass" id="password" placeholder="パスワード"><br><br>
<input type="submit" value="新規登録" id="signUp" name="signUp" class="submit-button">

</form>
</body>
</html>