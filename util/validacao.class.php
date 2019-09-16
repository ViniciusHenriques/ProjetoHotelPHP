<?php
class Validacao{
  public static function validarNome($a){
    $exp = "/^[A-zÀ-ú ]{2,30}$/";
    return preg_match($exp,$a);
  }
  public static function validarTelefone($a){
    $exp = "/^[0-9()-]{8,15}$/";
    return preg_match($exp,$a);
  }
  public static function validarEndereco($a){
    $exp = "/^[A-zÀ-ú 0-9-,]{3,100}$/";
    return preg_match($exp,$a);
  }
  public static function validarCPF($a){
    $exp = "/^\d{3}\.\d{3}\.\d{3}-\d{2}$/";
    return preg_match($exp,$a);
  }
  public static function validarNum($a){
    $exp = "/^[0-9]{1,5}$/";
    return preg_match($exp,$a);
  }
  public static function validarCod($a){
    $exp = "/^[0-9]{1,50}$/";
    return preg_match($exp,$a);
  }
  public static function validarSexo($val){
    $exp = "/^(Masculino|Feminino|masculino|feminino){1}$/";
    return preg_match($exp,$val);
  }

  public static function validarStatus($a){
    $exp = "/^(Simples Solteiro|Simples Casal|Padrao|Luxo|Cobertura)$/";
    return preg_match($exp,$a);
  }
  public static function validarValor($a){
    $exp = "/^[0-9,.]{1,10}$/";
    return preg_match($exp,$a);
  }
  public static function verificarData($data){
    if ( strlen($data) < 8){
          return false;
      }else{
          if(strpos($data, "-") !== FALSE){
              $partes = explode("-", $data);
              $dia = $partes[2];
              $mes = $partes[1];
              $ano = isset($partes[0]) ? $partes[0] : 0;
           
              date_default_timezone_set('America/Sao_Paulo');
              $date = date('Y-m-d');
              $partesDataHoje = explode("-", $date);
              $diaHj = $partesDataHoje[2];
              $mesHj = $partesDataHoje[1];
              $anoHj = isset($partesDataHoje[0]) ? $partesDataHoje[0] : 0;

              if (strlen($ano) < 4) {
                  return false;
              } else {
                  if (checkdate($mes, $dia,$ano)) {
                       if ($ano >= $anoHj) {
                         if (($ano == $anoHj && $mes < $mesHj) || ($ano ==$anoHj && $dia < $diaHj && $mes == $mesHj)) {
                           return false;

                         }else{
                            return true;
                         }

                       }else{
                          return false;
                       }
                  }else{
                       return false;
                  }
              }              
          }else{
              return false;
          }//fecha else
      }//fecha else
  }//fecha validarData
  public static function validarSenha($a){
    $exp = "/^[0-9a-z]{3,15}$/";
    return preg_match($exp,$a);
  }
  public static function validarLogin($a){
    $exp = "/^[0-9a-z]{3,20}$/";
    return preg_match($exp,$a);
  }
  public static function validarEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

  public static function validarReserva($dataEntrada,$dataSaida,$id,$idRes){
     
      $resDAO = new ReservaDAO();
      $array = $resDAO->buscarReserva();


        foreach ($array as $a) {
          if ($id==$a->idQuarto && $idRes != $a->idReserva ) {
            $datas = array();
            $datas[] = $a->dataentrada."/".$a->datasaida;

            
            if (count($datas)!=0) {
              for ($i=0; $i < count($datas); $i++) { 
                
                   $partesDataHoje = explode("/", $datas[$i]);
                   $dataEntradaBD = $partesDataHoje[0];
                   $dataSaidaBD = $partesDataHoje[1];
                   if (($dataEntrada>=$dataEntradaBD && $dataEntrada <= $dataSaidaBD)||($dataSaida>=$dataEntradaBD && $dataSaida <= $dataSaidaBD)) {
                     return false;
                   }


                   
              }//fecha for                                                    
            }            
          }//fecha if
        }//fecha foreach
        return true;
    }

  
}//fecha classe
