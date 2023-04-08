<?php
  //②フォームからのデータを受け取ります
  $name = $_POST['name'];
  $number = $_POST['number'];
  //③受け取った数字に1~6までのランダムな数字を掛け合わせて
  //変数に入れてください
  
  $total = $number * rand(1,6);

  //④掛け合わせた数字の結果によっておみくじを選び、変数に入れます
  
  if($total <= 10){
    $result = '凶';
  }elseif($total <= 15){
    $result = '小吉';
  }elseif($total <= 20){
    $result = "中吉";
  }elseif($total <= 36){
    $result ='大吉';
  }elseif($total <= 37){
    $result ='残念';
  }

  //⑤今日の日付と、名前、番号、おみくじ結果を表示しましょう

  echo date('Y/m/d');
  echo '<br>';
  echo "名前は{$name}です。";
  echo '<br>';
  echo "番号は{$total}です。";
  echo '<br>';
  echo "結果は{$result}です。";

?>
