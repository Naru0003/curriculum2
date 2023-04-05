<?php

// 消費税は10%
define('TAX' , '0.1');
// 商品を連想配列に入れる
$products = array(
  '鉛筆' => 100 ,
  '消しゴム' => 150 ,
  '物差し' => 500
);

function total($value){
  echo $value + $value * TAX;
}

foreach($products as $key => $value){
  
  echo  "{$key}の税込価格は";
  echo total($value). "円です";
  echo '<br>';
  
} 
?>