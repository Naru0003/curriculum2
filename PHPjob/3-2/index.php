<?php

// 消費税は10%
$tax = 0.1;
// 商品を連想配列に入れる
$products = array(
  '鉛筆' => 100 ,
  '消しゴム' => 150 ,
  '物差し' => 500
);


foreach($products as $key => $value){
  
  $total = $value + $value * $tax;
  echo  "{$key}の税込価格は{$total}円です。";
  echo '<br>';
  
} 
