<html>
<head>
<meta charset="utf-8">

</head>
<body >
<div id="calendario" >
<style type="text/css">

	.nome_mes{
		text-align: center;
		font-size: 30px;

	}
	td{
		border:0!important;
	}
	.semanas{
		background-color: skyblue;
		font-size: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
		letter-spacing: 35px;
		padding-left: 30px;
		border-top:1px solid black;
		border-bottom:1px solid black;
	}
	
	.calendario{
		background-color:white;
		border: 0px solid black;
		padding-top: 10px;
		margin-top: 100px;
		order:2;
		height: 350px;
	}
	.dia{
		text-decoration:none;
		font-size: 20px;
		color:black;
	}
	.dia_marcado{
		color: red;
		font-weight: bold;
	}
	.setaCalendario{

		color: white;

		font-weight: bold;

		font-size: 30px;

		
	}
	.setaProximo{
		width: 60px;
		height: 60px;
	}
	.proximo{
		margin-left: 491px;
		order: 1;
		position: absolute;
		margin-top: -320px;
		border-left: 0
	}
	.anterior{
		margin-left:  800px;
		order: 2;
		position: absolute;
		border-right: 0;
		margin-top: -320px;
	}
	.anterior:hover{
		margin-left: 810px;
	}
	.proximo:hover{
		margin-left: 481px;
	}
	.dataInvalida{
		color: gray;
	}
	
</style>
<?php

function MostreSemanas()
{
	$semanas = "DSTQQSS";

	for( $i = 0; $i < 7; $i++ )
	 echo "<td>".$semanas{$i}."</td>";

}

function GetNumeroDias( $mes,$ano)
{
	if ($ano%4 == 0 && $ano%100 != 0) {
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
	    $numero_dias['02'] = 29;	// altera o numero de dias de fevereiro se o ano for bissexto
	}

	return $numero_dias[$mes];
}

function GetNomeMes( $mes )
{
     $meses = array( '01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
                     '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
                     '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
                     '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
                     );

      if( $mes >= 01 && $mes <= 12)
        return $meses[$mes];

        return "Mês deconhecido";

}


function MostreCalendario( $mes ,$ano, $mesHj,$anoHj,$diaHj)
{
	
	
	
		$numero_dias = GetNumeroDias( $mes,$ano);	// retorna o número de dias que tem o mês desejado
		$nome_mes = GetNomeMes( $mes );
		$diacorrente = 0;
		$dia = " ";
		

	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana

	echo "<table border = 0 cellspacing = '0' align = 'center' class='calendario'>";
	 echo "<tr>";

	 		
         echo "<td colspan = 7><h3 class='nome_mes'>".$nome_mes." de ".$ano."</h3></td>";
	 echo "</tr>";
	 echo "<tr >";
	   echo "<td colspan = 7 ><h3 class='semanas'>DSTQQSS</h3></td>";
	 echo "</tr>";
	for( $linha = 0; $linha < 6; $linha++ )
	{


	   echo "<tr>";

	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
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

		
		$mesE = 14;
		$anoE = 11;
		$diaE = 2018;
		$diaS = 18;
		$mesS = 11;
		$anoS = 2018;
		$dia = "";

		$datas = array("16/11/2018/23/11/2018","16/12/2018/23/12/2018");
		$dataEntrada = null;
		$dataSaida=null;

		   /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */

		    if( $diacorrente + 1 <= $numero_dias ){
				 if( $coluna < $diasemana && $linha == 0){
				  	 echo " ";
				 }

				 else{	

				 		$type = "submit";
				 	for ($i=0; $i < count($datas); $i++) { 
				 		$partesDataHoje = explode("/", $datas[$i]);
			            $diaE = $partesDataHoje[0];
			            $mesE = $partesDataHoje[1];
			            $anoE = isset($partesDataHoje[2]) ? $partesDataHoje[2] : 2;
			            $diaS = $partesDataHoje[3];
			            $mesS = $partesDataHoje[4];
			            $anoS = isset($partesDataHoje[5]) ? $partesDataHoje[5] : 5;

						if ($mesE == $mesS && $anoE == $anoS && $mesE == $mes && $anoE == $ano ) {
							 		if ($diacorrente+1>=$diaE && $diacorrente+1 <= $diaS) {
							 			$dia = "dia_marcado' href='#' title='Data Ocupada'";
							 			$type = "reset";
							 		}
							 		if (isset($_GET['dia'])) {
							 			if ($diacorrente+1==$_GET['dia']) {
							 				$dia = "dia_marcado'  title='Data Ocupada'";
							 				$type = "reset";
							 			}
							 		}
							 		
							 	}else if ($mesE != $mesS && $anoE == $anoS )  {					 			
							 		if (($diacorrente+1>=1 && $diacorrente+1 <= $diaS && $mes==$mesS && $mesS == $mes ) ||
							 		 ($diacorrente+1>$diaE && $diacorrente+1 <= 31 && $mes==$mesE &&$mesE == $mes )) {
							 			$dia = "dia_marcado' href='#' title='Data Ocupada'";
							 			$type = "reset";
							 		}
							 		
							 		$p = $mesE+1;
							 		
							 		for ($i=$p; $i < $mesS; $i++) { 
							 			if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $mes == $i) {
									 		$dia = "dia_marcado' href='#' title='Data Ocupada'";
									 		$type = "reset";
									 	}
							 		}				 			
						 		}else if($anoE != $anoS ) {
						 			if (($diacorrente+1>=1 && $diacorrente+1 <= $diaS && $mes==$mesS && $ano==$anoS)||
						 			 ($diacorrente+1>=$diaE && $diacorrente+1 <= 31 && $mes==$mesE && $ano==$anoE)) {
							 			$dia = "dia_marcado' href='#' title='Data Ocupada'";
							 			$type = "reset";
							 		}				 		
						 			$a =$anoE+1;
							 		$p = $mesE+1;

							 		for ($i=$p; $i < 13; $i++) { 
							 			if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $mes == $i && $anoE == $ano) {
									 		$dia = "dia_marcado' href='#' title='Data Ocupada'";
									 		$type = "reset";
									 	}
							 		}
							 		for ($i=$a; $i < $anoS ; $i++) { 
							 			if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $ano == $i ) {
									 		$dia = "dia_marcado' href='#' title='Data Ocupada'";
									 		$type = "reset";
									 	}
							 		}
							 		
							 		for ($i=0; $i < $mesS; $i++) { 
							 			if ($diacorrente+1 >= 1 && $diacorrente+1<=31 && $mes == $i && $anoS == $ano) {
									 		$dia = "dia_marcado' href='#' title='Data Ocupada'";
									 		$type = "reset";
									 	}
							 		}

						 		}						 								 							 				 	
					}
				 		if ($mes==$mesHj && $ano==$anoHj) {
				 			if ($diacorrente+1 >= 1 && $diacorrente+1<$diaHj) {
						 		$dia = " dataInvalida'href='#' title='Data Passada'";
						 		$type = "reset";
						 	}
				 		}else if ($mes<=$mesHj && $ano<=$anoHj) {
				 			if ($diacorrente+1 >= 1 && $diacorrente+1<=31) {
						 		$dia = " dataInvalida'href='#' title='Data Passada'";
						 		$type = "reset";
						 	}
				 		}
				 		
						$oi = ++$diacorrente;
				   		echo "<form name='dia' action='' method='post'>";
				   		echo "<input type='".$type."' name='dia' class='dia ".$dia."' value='".$oi."'>";
				   		echo "</form>";
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

date_default_timezone_set('America/Sao_Paulo');
              $date = date('Y-m-d');
              $partesDataHoje = explode("-", $date);
              $diaHj = $partesDataHoje[2];
              $mesHj = $partesDataHoje[1];
              $anoHj = isset($partesDataHoje[0]) ? $partesDataHoje[0] : 0;

    if (isset($_POST['dia'])) {
      	echo $_POST['dia'];
     }  	
            
    $mes = $mesHj;
    $ano = $anoHj;          

    ?>
    <script type="text/javascript">
    count=0;
		$('#a').click(function(){
			count++;
			document.getElementeById('$cu').innerText = count;
		});
		
	</script>
    <?php
	MostreCalendario($mes,$ano,$diaHj,$mesHj,$anoHj);


			


echo "<br/>";
?>
<form name="cu" action="" method="post">
<input type='button' class='setaCalendario proximo'  name='anterior' value='Anterior' id='a' ><input type="text" name="cu" id="cu">
<input type='button' class='setaCalendario anterior' href='' name='proximo' value='Proximo' id='p'>

</form>
</body>
</html