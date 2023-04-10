<link rel="stylesheet" href="css/style.css">

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$name = $_POST['name'];
//問題文の選択肢の配列を作成
$question1 = ["80", "22", "20", "21"];
$question2 = ["PHP", "Python", "JAVA", "HTML"];
$question3 = ["join", "select", "insert", "update"];

$correct_answers = ['80', 'HTML', 'select'];
?>

<p>お疲れ様です<?php echo $name ?>さん</p>


<!--フォームの作成 通信はPOST通信で-->
<h2>①ネットワークのポート番号は何番？</h2>
<form action="answer.php" method="post">
  <!--問題のradioボタンを「foreach」を使って作成する-->
  <?php 
  foreach ($question1 as $value) {
    ?>
    <input type="radio" name="answer[0]" value="<?php echo $value ?>" />
    <?php echo $value;
  }
  ?>


<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

<?php
foreach ($question2 as $value) {?>
    <input type="radio" name="answer[1]" value="<?php echo $value ?>" />
    <?php echo $value;
}
?>

<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

<?php
foreach ($question3 as $value) {?>
    <input type="radio" name="answer[2]" value="<?php echo $value ?>" />
    <?php echo $value;
}
?>

<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<br>
<input type="hidden" name="name" value="<?php echo $name ?>" />
<input type="hidden" name="correct_answers" value="<?php echo implode(",", $correct_answers); ?>">
<input type="submit" value="回答する" />
</form>