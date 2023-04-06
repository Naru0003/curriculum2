<?php

//消費税は10%
// $tax = '0.1';
/*評価↓
定数で準備しましょう👍
定数にすることによって関数内でも参照する事ができる様になります。*/

define('TAX' , '0.1');

// 商品を連想配列に入れる
$products = array(
  '鉛筆' => 100 ,
  '消しゴム' => 150 ,
  '物差し' => 500
);
/*評価↓
arrayを使ってもいいのですが、見にくかったりコード量が多くなるので、
$products = [] ⇦この括弧で書く省略記法の方が楽ですよ!*/


function total($value){
  echo $value + $value * TAX;
}
/*評価↓
totalの部分
・関数名について
関数名は一目で何をしているかをわかりやすく書く方が良いです。
なので、例えば calculateTaxIncluded()のように動詞 ＋ 名詞にするとわかりやすいです。
左はTaxIncluded：税込 を calculate：計算する ということなので、何をしているかがわかりやすくなります。*/


foreach($products as $key => $value){
  
  echo  "{$key}の税込価格は";
  echo total($value). "円です";
  echo '<br>';
  
} 
?>