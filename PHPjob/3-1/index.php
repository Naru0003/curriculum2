<?php

for ($a =1; $a <=100; $a++){
  if($a % 3 != 0 && $a % 5 != 0){
    echo "$a<br>";
  }elseif($a % 3 ==0 && $a % 5 == 0){
    echo "FizzBuzz!<br>";
  }elseif ($a % 5 == 0){
    echo "Buzz!<br>";
  }elseif ($a % 3 == 0){
    echo "Fizz!<br>";
  }
}

?>


