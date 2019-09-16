<?php
          function MostreSemanas(){
            $semanas = "DSTQQSS";

            for( $i = 0; $i < 7; $i++ )
             echo "<td>".$semanas{$i}."</td>";
          }
          function GetNumeroDias( $mes ){
            if ($_GET['ano']%4 == 0 && $_GET['ano']%100 != 0) {
              $numero_dias = array( 
                '01' => 31, '02' => 29, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
                '07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
              );
            }else{
              $numero_dias = array( 
                  '01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
                  '07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
              );
            }

            if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0)
            {
                $numero_dias['02'] = 29;  // altera o numero de dias de fevereiro se o ano for bissexto
            }

            return $numero_dias[$mes];
          }
          function GetNomeMes( $mes ){
               $meses = array( '01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
                               '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
                               '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
                               '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
                               );

                if( $mes >= 01 && $mes <= 12)
                  return $meses[$mes];

                  return "Mês deconhecido";
          }

          function MostreCalendario( $mes ,$ano, $mesHj,$anoHj,$diaHj){
              $numero_dias = GetNumeroDias( $mes);  // retorna o número de dias que tem o mês desejado
              $nome_mes = GetNomeMes( $mes );
              $diacorrente = 0;
              $dia = " ";
            
            $diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );  // função que descobre o dia da semana

             echo "<table border = 0 cellspacing = '0' align = 'center' class='calendario'>";
             echo "<tr>";                
             echo "<td colspan = 7><h3 class='nome_mes'>".$nome_mes." de ".$ano."</h3></td>";
             echo "</tr>";
             echo "<tr >";
               echo "<td colspan = 7 ><h3 class='semanas'>DSTQQSS</h3></td>";
             echo "</tr>";
            for( $linha = 0; $linha < 6; $linha++ ){
               echo "<tr>";
               for( $coluna = 0; $coluna < 7; $coluna++ ){
              echo "<td width = 30 height = 30 class='dias'";

                if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
                { 
                   echo " id = 'dia_atual' ";
                }else{
                    if(($diacorrente + 1) <= $numero_dias ){
                        if( $coluna < $diasemana && $linha == 0){
                      echo " id = 'dia_branco' ";
                    }else{                     
                          echo  " id = 'dia_comum' ";                        
                    }
                  }
                     else{
                    echo " ";
                     }
                }
                  echo " align = 'center' valign = 'center'>";
                  $dia = "";

                  if( $diacorrente + 1 <= $numero_dias ){
                   if( $coluna < $diasemana && $linha == 0){
                       echo " ";
                   }
                   else{  
                    
                    $resDAO = new ReservaDAO();
                    $array = $resDAO->buscarReserva();
                      foreach ($array as $a) {
                        if ($_GET['idQ']==$a->idQuarto) {
                          $datas = array();
                          $datas[] = $a->dataentrada."-".$a->datasaida;

                          for ($i=0; $i < count($datas); $i++) { 
                            $partesDataHoje = explode("-", $datas[$i]);
                                $diaE = $partesDataHoje[2];
                                $mesE = $partesDataHoje[1];
                                $anoE = isset($partesDataHoje[0]) ? $partesDataHoje[0] : 0;
                                $diaS = $partesDataHoje[5];
                                $mesS = $partesDataHoje[4];
                                $anoS = isset($partesDataHoje[3]) ? $partesDataHoje[3] : 3;
                            if ($mesE == $mesS && $anoE == $anoS && $mesE == $mes && $anoE == $ano ) {
                              if ($diacorrente+1>=$diaE && $diacorrente+1 <= $diaS) {
                                $dia = "dia_marcado' href='#' title='Data Ocupada'";
                              }
                            }else if ($mesE != $mesS && $anoE == $anoS )  {               
                              if (($diacorrente+1>=1 && $diacorrente+1 <= $diaS && $mes==$mesS && $mesS == $mes ) ||
                               ($diacorrente+1>=$diaE && $diacorrente+1 <= 31 && $mes==$mesE &&$mesE == $mes )) {
                                $dia = "dia_marcado' href='#' title='Data Ocupada'";
                              }
                              
                              $p = $mesE+1;
                              
                              for ($i=$p; $i < $mesS; $i++) { 
                                if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $mes == $i) {
                                  $dia = "dia_marcado' href='#' title='Data Ocupada'";
                                }
                              }             
                            }else if($anoE != $anoS ) {
                              if (($diacorrente+1>=1 && $diacorrente+1 <= $diaS && $mes==$mesS && $ano==$anoS)||
                               ($diacorrente+1>=$diaE && $diacorrente+1 <= 31 && $mes==$mesE && $ano==$anoE)) {
                                $dia = "dia_marcado' href='#' title='Data Ocupada'";
                              }           
                              $a =$anoE+1;
                              $p = $mesE+1;

                              for ($i=$p; $i < 13; $i++) { 
                                if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $mes == $i && $anoE == $ano) {
                                  $dia = "dia_marcado' href='#' title='Data Ocupada'";
                                }
                              }
                              for ($i=$a; $i < $anoS ; $i++) { 
                                if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $ano == $i ) {
                                  $dia = "dia_marcado' href='#' title='Data Ocupada'";
                                }
                              }
                              
                              for ($i=0; $i < $mesS; $i++) { 
                                if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $mes == $i && $anoS == $ano) {
                                  $dia = "dia_marcado' href='#' title='Data Ocupada'";
                                }
                              }
                            }                                                                       
                            
                        }//fecha if
                      }//fecha foreach
                    }//fecha else                      
                        if ($_GET['mes']==$mesHj && $_GET['ano']==$anoHj) {
                              if ($diacorrente+1 >= 1 && $diacorrente+1<$diaHj) {
                                $dia = " dataInvalida'href='#' title='Data Passada'";
                              }
                        }else if ($_GET['mes']<=$mesHj && $_GET['ano']<=$anoHj) {
                          if ($diacorrente+1 >= 1 && $diacorrente+1<=31) {
                            $dia = " dataInvalida'href='#' title='Data Passada'";
                          }
                        }
                       echo "<a class='dia ".$dia."' href = '".$_SERVER["PHP_SELF"]."?mes=$mes&dia=".($diacorrente+1)."&ano=$ano&id=".$_GET['ano']."'>".++$diacorrente . "</a>";                      
                   }
                }else{
                  break;
                }
            echo "</td>";
               }
               echo "</tr>";
            }
            echo "</table>";
          }