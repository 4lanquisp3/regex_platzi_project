<?php

$file = fopen("./results.csv", "r");

$match = 0;
$nomatch = 0;

$t= time();

while(!feof($file)){
   $line = fgets($file);
   // 1873-03-08,England,Scotland,4,2,Friendly,London,England,FALSE
   if(preg_match(
      '/^(\d{4}\-\d\d\-\d\d),(.+),(.+),(\d+),(\d+),.*$/i',
      $line,
      $m
   )){
      if($m[4] == $m[5]){
        echo "empate: ";        
      }elseif($m[4] > $m[5]){
        echo "local:   "; // espacios extra para que el tab sea correcto
      }else{
        echo "visitante: ";
      }
      printf("\t%s, %s [%d-%d]\n",$m[2],$m[3],$m[4],$m[5]);
      $match++;
   }else{
     $nomatch++;
   }
}

fclose($file);
printf("\n\nmatch: %d\nno match: %d\n", $match, $nomatch);

printf("tiempo: %d Seg.\n", time() - $t);

?>