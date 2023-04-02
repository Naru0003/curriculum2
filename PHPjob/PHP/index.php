<?php

$name = 'taro';
$pass = 'pass';

if ($name == 'taro' && $pass == 'pass'){
  echo 'ログイン成功です';
} elseif ($name == 'taro') {
  echo  'パスワードが間違っています';
} elseif ($pass == 'pass') {
  echo '名前が間違っています';
} elseif ($name != 'taro' && $pass != 'pass') {
  echo '入力情報が間違っています';
}
echo '<br>';

$num = 0; 
do {
    echo $num.'<br>';
    $num++; 
} while($num <= 100);

?>