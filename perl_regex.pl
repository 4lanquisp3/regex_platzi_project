#!/usr/bin/perl

use strict;
use warnings; # los warnings que los muestre en pantalla

my $t = time;

open(my $f, "./results.csv") or die("No hay archivo");

my $match = 0;
my $nomatch = 0;

while(<$f>){
  chomp; # Quita saltos de linea y caracteres raros
  if(m/^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$/){ # m = Match
  #[\d] debe estar dentro de una clase
    if($5 > $4){
      printf(" %s: %s (%d) - (%d) %s\n",
          $1, $2, $4, $5, $3
        );
    }    
    $match++;
  }else{
    $nomatch++;
  }
}

close($f);

printf("Se encontraron: \n - %d matches\n %d no matches\ntardo %d segundos\n",$match,$nomatch,time() - $t);