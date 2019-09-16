<?php
class Padronizacao{
  public static function padronizarMaiMin($v){
    return ucwords(strtolower($v));
  }
  public static function juntarNome($v1,$v2){
    $array = array($v1,$v2);
    return implode(" ",$array);


  }
  
  public static function padronizarValor($a){
    return number_format($a,2);
  }

}
