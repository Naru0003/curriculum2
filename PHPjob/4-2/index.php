<?php
// 作成したpdo.phpを読み込む
// ↓はgetData.phpで使うものなのでここでは読まなくていい
// require_once('pdo.php');
require_once('getData.php');

// getDataクラスのインスタンスを作成
$get_data = new getData();

// ユーザ情報の取得
$user_data = $get_data->getUserData();

// 記事情報の取得
$post_data = $get_data->getPostData();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <!-- ヘッダー -->
  <header>
    <!-- ヘッダーロゴ -->
    <div class="header_logo">
      <img src="1599315827_logo.png" width="200"  height="120" alt="logo画像">
    </div>
    <!-- ヘッダーユーザ名 -->
    <div class="header_user">
      ようこそ
      <?php 
        echo $user_data['last_name'].$user_data['first_name'];
      ?>
      さん
    </div>
    <!-- ヘッダー最終ログイン -->
    <div class="header_lastlogin">
      最終ログイン日：
      <?php 
        echo $user_data['last_login'];
      ?>
    </div>
  </header>

<main>
  <div class="table">
    <table>
      <thead>
        <tr>
          <th>記事ID</th>
          <th>タイトル</th>
          <th>カテゴリ</th>
          <th>本文</th>
          <th>投稿日</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($post_data as $row) : ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td>
            <?php
                switch($row['category_no']){
                  case 1:
                    echo "食事";
                    break;
                  case 2:
                    echo "旅行";
                    break;
                  default:
                    echo "その他";
                    break;
                }
              ?>
            </td>
            <td><?= $row['comment'] ?></td>
            <td><?= $row['created'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

  <!-- フッダー -->
  <footer>
    <div class="footer_logo">
      Y&I group.inc
    </div>
  </footer>
  
</body>
</html>