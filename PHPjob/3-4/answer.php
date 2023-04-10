<link rel="stylesheet" href="css/style.css">

<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$name = $_POST['name'];
$answers = $_POST['answer'];
$correct_answers = explode(",", $_POST['correct_answers']);


//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function checkAnswer($answer, $correct_answer) {
  if ($answer == $correct_answer) {
    echo "正解！";
  } else {
    echo "残念・・・";
  }
}

?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $name ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php checkAnswer($answers[0], $correct_answers[0]); ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php checkAnswer($answers[1], $correct_answers[1]); ?>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php checkAnswer($answers[2], $correct_answers[2]); ?>


