<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

try {
  $pdo = connect();

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // フォームから送信されたデータを取得
    $title = $_POST["title"];
    $date = $_POST["date"];
    $stock = $_POST["stock"];

    // データベースに本の情報を挿入
    $sql = 'INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':stock', $stock);
    $stmt->execute();

 // 登録完了後に別のページにリダイレクトする場合は、以下の行を修正
  header('Location: bookList.php');
  exit();
}
} catch (Exception $e) {
header('Location: bookList.php');
exit();
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
<h1>本 登録画面</h1>
<form method="POST" action="">

<input type="text" name="title" id="title" placeholder="タイトル">
<br>
<input type="date" name="date" id="date"><br>
在庫数<br>
<select name="stock">
<option value="" selected disabled>選択してください</option>
<?php
  for ($i = 1; $i <= 100; $i++) {
    ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php
  }
  ?>
</select><br>
<input type="submit" value="登録" id="register" name="register" class="submit-button">
</form>
</body>
</html>