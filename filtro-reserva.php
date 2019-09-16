<?php
session_start();
ob_start();

if(isset($_SESSION['privateUser'])){

  $u = unserialize($_SESSION['tipo']);
  if($u != 'funcionario'){
    header("location:login.php");
  }
}else{
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Hotel - Filtro de Reserva</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <h2>Filtro de Reserva</h2>
      <form name="filtrolivro" method="post" action="">
        <div class="form-group col-md-8">
          <input type="text" name="txtpesquisa"
                 placeholder="Digite a sua pesquisa"
                 class="form-control" >
        </div>
        <div class="form-group col-md-4">
          <select name="rdfiltro" class="form-control ">            
            <option value="idreserva">Código</option>
            <option value="idHospede">Código do Hospede</option>
            <option value="idFuncionario">Código de Funcionario</option>
            <option value="idQuarto">Código Quarto</option>
            <option value="dataentrada">Data de Entrada</option>
            <option value="datasaida">Data de Saída</option>
          </select>   
        </div>
        

        <div class="form-group col-md-6">
          <input type="submit" name="filtrar" value="Filtrar"
                 class="btn btn-primary filtro" class="form-control">
        </div>
        <div class="form-group col-md-6">    
          <input type="submit" name="filtrar" value="Mostrar Todos"
                 class="btn btn-primary filtro2" class="form-control">
        </div>
      </form>

      <?php
      include 'dao/reservadao.class.php';
      include 'modelo/reserva.class.php';
      include 'util/validacao.class.php';
      if(isset($_POST['filtrar'])) {


        $filtro = $_POST['rdfiltro'];
        $pesq = $_POST['txtpesquisa'];
        $query = "";

        if($pesq != ""){

          if($filtro == 'idreserva' && Validacao::validarCod($pesq)){
            $query = "where idReserva = ".$pesq;
          }else if($filtro == 'idHospede' && Validacao::validarCod($pesq)){
            $query = "where idHospede like '%".$pesq."%'";
          }else if($filtro == 'dataentrada'){
            $query = "where dataEntrada like '%".$pesq."%'";
          }else if($filtro == 'datasaida'){
            $query = "where dataSaida like '%".$pesq."%'";
          }else if($filtro == 'idFuncionario' && Validacao::validarCod($pesq)){
            $query = "where idFuncionario like '%".$pesq."%'";
          }else if($filtro == 'idQuarto' && Validacao::validarCod($pesq)){
            $query = "where idQuarto like '%".$pesq."%'";
          }
        }

        $resDAO = new ReservaDAO();
        $array = $resDAO->filtrar($query);

      } else {

        $resDAO = new ReservaDAO();
        $array = $resDAO->buscarReserva();

      }

      if(count($array) != 0){
      ?>
      
      <div class="table-responsive col-md-12">
        <table class="table table-striped table-bordered bg-link    table-hover table-condensed">
          <thead>
            <tr class="info">
              <th>Código</th>
              <th>Código Hospede</th>
              <th>Data de entrada</th>
              <th>Data de Saída</th>
              <th>Código Funcionario</th>
              <th>Código Quarto</th>

            </tr>
          </thead>

          <tfoot>
            <tr class="active">
              <th>Código</th>
              <th>Código Hospede</th>s
              <th>Data de entrada</th>
              <th>Data de Saída</th>
              <th>Código Funcionario</th>
              <th>Código Quarto</th>

            </tr>
          </tfoot>

          <tbody>
            <?php
            foreach($array as $a){
              echo "<tr class='active'>";
                echo "<td>$a->idReserva</td>";
                echo "<td>$a->idHospede</td>";
                echo "<td>$a->dataentrada</td>";
                echo "<td>$a->datasaida</td>";
                echo "<td>$a->idFuncionario</td>";
                echo "<td>$a->idQuarto</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      
      <?php
        }else{
          echo "<h2 class='col-md-12'>Não há dado(s) para serem exibidos!</h2>";
        }
        unset($array);
      ?>
      
      
    
  </body>
</html>
