<?php
session_start();
ob_start();

if(!isset($_SESSION['privateUser'])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <title>Hotel - Cadastro Reserva</title>
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">  </script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      @font-face {font-family: 'turtle';src: url(../fontes/Turtles.ttf);}

    .nome_mes{
    text-align: center!important;
    font-size: 30px!important;
    border: 0!important;
    font-family: 'Turtles';

  }
  .semanas{
    background-color: black!important;
    font-size: 20px!important;
    padding-top: 5px!important;
    padding-bottom: 5px!important;
    letter-spacing: 35px!important;
    padding-left: 30px!important;
    border-top:1px solid black!important;
    border-bottom:1px solid black!important;
    font-family: 'Turtles';
    color: white;
  }
  td{
    border:0!important;
  }
  
  table{
    background-color:white!important;

    padding-top: 10px!important;
    margin-top: 100px!important;
    order:2!important;
    height: 350px!important;
  }
  .dia{
    text-decoration:none!important;
    font-size: 20px!important;
    color:black!important;
    border: 0!important;
  }
  .dia_marcado{
    color: red!important;
    font-weight: bold!important;
  }
  .setaCalendario{

    color: white!important;

    font-weight: bold!important;

    font-size: 30px!important;

    
  }
  .setaProximo{
    width: 60px!important;
    height: 60px!important;
  }
  .proximo{
    margin-left: -190px!important;
    order: 1;
    position: absolute!important;
    margin-top: -340px!important;
    border-left: 0!important;
  }
  .anterior{
    margin-left:  130px!important;
    order: 2;
    position: absolute!important;
    border-right: 0!important;
    margin-top: -340px!important;
  }
  .anterior:hover{
    margin-left: 140px!important;
  }
  .proximo:hover{
    margin-left: -200px!important;
  }
  .dataInvalida{
    color: gray!important;
  }
  
    </style>
  </head>
  <body>
    <div class="container-fluid" > <!-- container-fluid -->
        <div id="banner" class="col-md-12"><h5 id="hotel">Hotel</h5></div>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

        <div class="col-md-10">
        <ul class="nav navbar-nav">
          <?php
          if(isset($_SESSION['privateUser'])){

            $u = unserialize($_SESSION['tipo']);
            if($u == 'funcionario'){
          ?>

              <li><a href="index.php">Página Inicial</a></li>

              <li><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">Cadastro</a>
                <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
                  <li><a href="cadastro-funcionario.php">Funcionário</a>
                  </li>
                  <li><a href="cadastro-quarto.php">Quarto</a>
                  </li>
                  <li><a href="cadastro-hospede.php">Hospede</a>
                  </li>
                  <li><a href="cadastro-reserva.php">Reserva</a>
                  </li>
                </ul>
              </li>
              <li><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu2" aria-expanded="false">Consulta</a>
                <ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="btn-1">
                  <li><a href="consulta-funcionario.php">Funcionário</a>
                  </li>
                  <li><a href="consulta-reserva.php">Reserva</a>
                  </li>
                  <li><a href="consulta-hospede.php">Hospede</a>
                  </li>
                  <li><a href="consulta-quarto.php">Quarto</a>
                  </li>
                </ul>
              </li>

              <li><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">Filtro</a>
                <ul class="nav collapse" id="submenu3" role="menu" aria-labelledby="btn-1">
                  <li><a href="filtro-funcionario.php">Funcionário</a>
                  </li>
                  <li><a href="filtro-reserva.php">Reserva</a>
                  </li>
                  <li><a href="filtro-hospede.php">Hospede</a>
                  </li>
                  <li><a href="filtro-quarto.php">Quarto</a>
                  </li>
                </ul>
              </li>
              <li><a href="contato.php">Contato</a> </li>
              </div>
                <div class="col-md-2 login">
                <a href="login.php" class="login"><form name="deslogar" action="login.php" method="post" >
                    <span class="form-inline btn-default" style="color:white"><i class="glyphicon glyphicon-log-in"></i>
                    <input type="submit" name="deslogar" class="btn btn-default" value="Sair" style="font-size: 30px;margin-top: -5px;"></span>
                  </form></a>
              </div>
          <?php
        }else if($u == 'hospede'){
            ?>
              <li><a href="index.php">Página Inicial</a></li>

              <li><a href="cadastro-reserva.php">Fazer Reserva</a></li>

                    <li><a href="filtro-quarto.php">Quartos</a>
                    </li>

                <li><a href="contato.php">Contato</a> </li>
                </div>
                <div class="col-md-2 login">
                  <li class="dropdown"><span class="form-inline" style="color:white"><i class="glyphicon glyphicon-user"></i>
                  </span><a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color:black;">
                      <li><a href="consulta-dados.php">Seus Dados</a></li>
                      <li id="linkmeio"><a href="consulta.php">Reservas</a></li>
                      <li><a href="login.php" ><form name="deslogar" action="login.php" method="post" ><input id="link" type="submit" name="deslogar" class="btn btn-link" value="Sair"></a></form></li>
                    </ul>
                  </li>
                </div>

              </ul>
            <?php
            }
          }else{
          ?>
          <li ><a href="index.php">Página Inicial</a></li>

          <li><a href="cadastro-hospede.php">Cadastro</a>
          <li><a href="contato.php" >Contato</a> </li>
          </div>
          <div class="col-md-2 login">
          <a href="login.php" class="login"><form name="deslogar" action="login.php" method="post" >
              <span class="form-inline btn-default" style="color:white"><i class="glyphicon glyphicon-log-in"></i>
              <input type="submit" name="logar" class="btn btn-default" value="Login" style="font-size: 30px;margin-top: -5px;"></span>
            </form></a>
            </div>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </nav>
    <style media="screen">
    .erro::-webkit-input-placeholder { /* WebKit browsers */
      color: red;
    }

    .erro:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
      color: red;
    }

    .erro::-moz-placeholder { /* Mozilla Firefox 19+ */
      color: red;
    }

    .erro:-ms-input-placeholder { /* Internet Explorer 10+ */
      color: red;
    }
    </style>
    <section class="col-md-12" style="
    margin:auto; background-color:transparent">
    <h2>Cadastro de Reserva</h2>  
    

          
          <?php
            include 'dao/reservadao.class.php';
            include 'modelo/funcionario.class.php';
            include 'modelo/quarto.class.php';
            include 'util/padronizacao.class.php';
            include 'util/validacao.class.php';
            include 'util/seguranca.class.php';
            include 'modelo/reserva.class.php';
            include 'modelo/hospede.class.php';
            $resDAO = new ReservaDAO();
            $array2 = $resDAO->buscarQuarto();

          ?>
          </select>
         
        </div>
        <div class="form-group">
        <div class="form-group">
          <label class="dataLb" style="margin-top: 10px;">Escolha o Quarto!</label>
        </div>
      <div class="form-inline">
        <form name="qua" action="" method="post">
             
                  <div class="form-group  col-md-8" >
                    <select name="quarto" class="form-control" id="selQua" style="width: 100%!important">
                      <option value="op1">Selecione o quarto que desejar!!!</option>

                      <?php
                      if(count($array2)){

                          foreach ($array2 as $res) {
                              if (isset($_GET['id'])) {
                                
                                  ?>
                                   <option <?php if ($_GET['id']==$res->idQuarto) {echo "selected='selected'";}?>
                                   value="<?php echo $res->idQuarto; ?>">
                                   <?php echo $res->idQuarto;echo " - Número ";echo $res->numQuarto;echo " - ";echo $res->status?> 
                                   </option>
  
                                   <?php
                                 
                              }else{
                                 ?>

                                 <option 
                                 value="<?php echo $res->idQuarto; ?>">
                                 <?php echo $res->idQuarto;echo " - Número ";echo $res->numQuarto;echo " - ";echo $res->status?> 
                                 </option>

                                 <?php
                              }
                               

                           }
                       }
                      ?>
                    </select>
                  </div>  
                
                  <div class="form-group col-md-2" >
                    <input type="submit" name="escolher" value="Ver Disponibilidade" class="btn btn-info enviar " style="width: 100%!important">
                  </div>
              </form>
          </div> 
        </div>
        <?php
            include 'util/data.php';
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d');
            $partesDataHoje = explode("-", $date);
            $diaHj = $partesDataHoje[2];
            $mesHj = $partesDataHoje[1];
            $anoHj = isset($partesDataHoje[0]) ? $partesDataHoje[0] : 0;
            $proximoMes = $mesHj;
            $proximoAno = $anoHj;
            $anteriorMes = $mesHj;
            $anteriorAno = $anoHj;
            if (isset($_GET['idQ'])) {                      
                      $mes = $_GET['mes'];
                      if ($mes >12) {
                        $proximoMes = 01;
                        $proximoAno= $_GET['ano']+1;
                        header("location:".$_SERVER["PHP_SELF"]."?mes=01&ano=".$proximoAno."&idQ=".$_GET['idQ']);
                        MostreCalendario($mes,$_GET['ano'],$mesHj,$anoHj,$diaHj);
                      }else if($mes <=0){
                        $anteriorMes = 12;
                        $anteriorAno = $_GET['ano']-1;
                        header("location:".$_SERVER["PHP_SELF"]."?mes=12&ano=".$anteriorAno."&idQ=".$_GET['idQ']);
                        MostreCalendario($mes,$_GET['ano'],$mesHj,$anoHj,$diaHj);
                      }else{
                        $proximoMes = str_pad($mes+1, 2 ,'0', STR_PAD_LEFT);
                        $anteriorMes = str_pad($mes-1, 2 ,'0', STR_PAD_LEFT);
                        $proximoAno = $_GET['ano'];
                        $anteriorAno = $_GET['ano'];
                        
                        MostreCalendario($mes,$_GET['ano'],$mesHj,$anoHj,$diaHj);
                      }
                      if ($_GET['mes']==$mesHj && $_GET['ano']==$anoHj ) {
                        echo "<a class='setaCalendario anterior' href='".$_SERVER["PHP_SELF"]."?mes=".$proximoMes."&ano=".$proximoAno."&idQ=".$_GET['idQ']."'><img src='imagens/seta.png' class='setaProximo' title='Mês Seguinte'></a>";
                      }else{
                        echo "<a class='setaCalendario proximo' href='".$_SERVER["PHP_SELF"]."?mes=".$anteriorMes."&ano=".$anteriorAno."&idQ=".$_GET['idQ']."'><img src='imagens/seta2.png' class='setaProximo' title='Mês Anterior'></a>";
                        echo "<a class='setaCalendario anterior' href='".$_SERVER["PHP_SELF"]."?mes=".$proximoMes."&ano=".$proximoAno."&idQ=".$_GET['idQ']."'><img src='imagens/seta.png' class='setaProximo' title='Mês Seguinte'></a>";
                      }

              }
            if (isset($_POST['escolher'])) {
                  if ($_POST['quarto'] != 'op1') {
                    header("location:cadastro-reserva.php?mes=".$mesHj."&ano=".$anoHj."&idQ=".$_POST['quarto']);
                  }else{
                    header("location:cadastro-reserva.php");
                  }
                }

          echo "<br/>";
        ?>
    <form name="cadres" action="" method="post">
        <div class="form-group">
          <label class="dataLb">Data Entrada</label>
          <input type="date" name="dataEntrada" placeholder="Data de Entrada" class="form-control" pattern="^([1-9]|0[1-9]|[1,2][0-9]|3[0,1])/([0-9][1-9]|1[0,1,2])/\d{4}$" id="dateEn" >; 
          }?>">
        </div>        
        <div class="form-group">
          <label class="dataLb">Data Saída</label>
            <input type="date" name="dataSaida" placeholder="Data de Saída" class="form-control" pattern="^([1-9]|0[1-9]|[1,2][0-9]|3[0,1])/([0-9][1-9]|1[0,1,2])/\d{4}$" id="dateSai">
          </div>
        <div class="form-group">
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-info enviar">
        <input type="reset" name="limpar" value="Limpar" class="btn btn-secundy enviar" style="margin-left:10px;">
      </div>
    </form>
    <?php
           
            if(isset($_POST['cadastrar'])){

              

              $login = unserialize($_SESSION['login']);
              if ($u=='hospede') {
                $array = $resDAO->buscarHospede($login);
                foreach ($array as $a) {
                  $idHos = $a->idHospede;
                  $idFun = 0;
                }
              }else{
                $array = $resDAO->buscarIdFunc($login);
                foreach ($array as $a) {
                  $idFun = $a->idFuncionario;
                  $idHos = 0;
                }
              }
              $quarto = $_GET['idQ'];
              $dataEntrada = $_POST['dataEntrada'];             
              $dataSaida = $_POST['dataSaida'];
              $data = $dataEntrada."-".$dataSaida;

              $erros = array();
              if(!Validacao::verificarData($dataEntrada)){
                $erros[] = "";
                ?>
                <script type="text/javascript">
                var txt = "Você digitou uma data de entrada inválido";
                  mostrarErro('dateEn',txt);
                </script>

                <?php
              }
              if(!Validacao::validarReserva($dataEntrada,$dataSaida,$_GET['idQ'],null)){
                $erros[] = "<h2>Já existe reserva durante essa data!!</h2></h2>Escolha outra data ou outro quarto...</h2>";

              }
              if(!Validacao::verificarData($dataSaida)){
                $erros[] = "";
                ?>
                <script type="text/javascript">
                var txt = "Você digitou uma data de saida inválido";
                  mostrarErro('dateSai',txt);
                </script>

                <?php
              }

              if ($quarto =='op1') {
                $erros[] = "<h6>Selecione o Quarto</h6>";
                $erros[] = "";
                ?>
                <script type="text/javascript">
                var txt = "Você digitou uma data de saida inválido";
                  mostrarErro('selQua',txt);
                </script>

                <?php
              }

              if(count($erros)==0){
                $res = new Reserva();
                $res->dataEntrada =  $dataEntrada;
                $res->dataSaida = $dataSaida;
                $res->quarto = $quarto;
                $res->hospede = $idHos;
                $res->funcionario = $idFun;
                $resDAO->cadastrarReserva($res);

                $arrayRes = $resDAO->buscarIdReserva($res);
                foreach ($arrayRes as $a) {
                  $idReserva = $a->idReserva;
                }
                $res->idReserva = $idReserva;
                $resDAO->UpdateReserva($res);
                
                header("location:cadastro-reserva.php?mes=".$_GET['mes']."&ano=".$_GET['ano']."&idQ=".$_GET['idQ']."&c=c");
              }else{
                foreach ($erros as $e) {
                  echo $e;
                }
              }
              

            }
    
            if (isset($_GET['c'])) {
              echo "<h2>Cadastro feito com sucesso!!!</h2>";
            }
      ?>

    </section>

  </body>
</html>
