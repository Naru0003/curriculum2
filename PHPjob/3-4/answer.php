<link rel="stylesheet" href="css/style.css">

<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$name = $_POST['name'];
$answers = $_POST['answer'];
$correct1 = $_POST['correct1'];
$correct2 = $_POST['correct2'];
$correct3 = $_POST['correct3'];
$corrects = ["$correct1","$correct2","$correct3"];


//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function correctAnswer($answers,$corrects){
  if ($answers == $corrects){
    print '正解！';
  }else{
    print '残念・・・';
  }
}
?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $name ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?PHP correctAnswer(0,0); ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?PHP correctAnswer(1,1); ?>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?PHP correctAnswer(2,2); ?>