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
<html lang="pr-br">
  <head>
    <meta charset="utf-8">
    <title>Hotel - Cadastro Quarto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">  </script>
    <script type="text/javascript" src="js/script.js"></script>
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

              <li><a href="cadastro-hospede.php">Cadastrar Hospede</a>

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
                      <span class="form-inline" style="color:white"><i class="glyphicon glyphicon-log-in"></i>
                      <input type="submit" name="deslogar" class="btn btn-default" value="Sair"></span>
                    </form></a>
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
    <section style="width: 700px;
    height: 400px;
    margin:auto; background-color:transparent">

      <h2> Cadastro do Quarto</h2>
      <form name="cadhos" action="" method="post">

        <div class="form-group">
          <input type="number" name="numQuarto" placeholder="Número do Quarto" class="form-control" pattern="^[0-9]{2,5}$" id="num">
        </div>
        <div class="form-group">
          <input type="number" name="andar" placeholder="Andar" class="form-control" pattern="^[0-9]{2,5}$" id="andar">
        </div>
        <div class="form-group">
          <select name="status" class="form-control">
            <option value="Simples Solteiro">Simples/solteiro</option>
            <option value="Simples Casal">Simples/Casal</option>
            <option value="Padrão">Padrão</option>
            <option value="Luxo">Luxo</option>
            <option value="Cobertura">Cobertura</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-info enviar">
          <input type="reset" name="limpar" value="Limpar" class="btn btn-secundy enviar">
        </div>
      </form>


      <?php
      if(isset($_POST['cadastrar'])){

        include 'util/padronizacao.class.php';
        include 'util/validacao.class.php';
        include 'dao/quartodao.class.php';
        include 'util/seguranca.class.php';
        include 'modelo/quarto.class.php';




        $erros = array();


        $numQuarto = $_POST['numQuarto'];
        $status = $_POST['status'];
        $andar = $_POST['andar'];

        if($status == 'Simples Solteiro'){
          $valor = 50.00;
        }else if($status == 'Simples Casal'){
          $valor = 70.00;
        }else if ($status == 'Padrão') {
          $valor = 100.00;
        }else if($status == 'Luxo'){
          $valor = 150.00;
        }else if($status == 'Cobertura'){
          $valor = 250.00;
        }


        if(!Validacao::validarNum($numQuarto)){
          $erros[] = "";
          ?>
          <script type="text/javascript">
          var txt = "Você digitou número do quarto inválido";
            mostrarErro('num',txt);
          </script>

          <?php
        }
        if(!Validacao::validarNum($andar)){
          $erros[] = "";
          ?>
          <script type="text/javascript">
          var txt = "Você digitou um andar inválido";
            mostrarErro('andar',txt);
          </script>

          <?php
        }

        if(!Validacao::validarStatus($status)){
          $erros[] = "<h6>Status inválido</h6>";
        }





        if(count($erros)==0){
          $quaDAO = new QuartoDAO();

          $array = $quaDAO->validarQuarto($numQuarto);
          foreach ($array as $a) {
            if(isset($array)){
              $erros[] = "<h6>Esse quarto já existe!</h6>";
            }
          }
          $qua = new Quarto();
          $qua->numQuarto = $numQuarto;
          $qua->status = $status;
          $qua->estado = "Vago";
          $qua->valor =  Padronizacao::padronizarValor($valor);
          $qua->andar = $andar;

          $quaDAO->cadastrarQuarto($qua);
          echo "<h2>Quarto cadastrado com sucesso!!!</h2>";
        }else{
          foreach ($erros as $e) {
            echo $e;
          }
        }

      }

         ?>
    </section>
  </div>
  </body>
</html>
