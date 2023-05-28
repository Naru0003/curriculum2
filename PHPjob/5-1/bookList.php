<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$pdo = connect();
$sql = "SELECT * FROM books";

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $rowCount = $stmt->rowCount();  
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  die();
}
?>


<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="style.css">
    <title>在庫管理システムメインメニュー</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>在庫一覧画面</h1>
    <input type="button" onclick="location.href='bookRegister.php'" value="新規在庫登録" class="register-button">
    <input type="button" onclick="location.href='logout.php'" value="ログアウト" class="logout-button">
    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo date('Y/m/d', strtotime($row['date'])); ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a href="delete_post.php?id=<?php echo $row['id']; ?>"class="delete-button">削除</a></td>
            </tr>
        <?php } ?>
        <?php if ($rowCount == 0) {  ?>
            <tr>
                <td colspan="4">データがありません</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>