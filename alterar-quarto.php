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
    <title>Hotel - Alterar Quarto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
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
      <h2>Alterar Reserva</h2>
        <?php
        include 'dao/quartodao.class.php';
        include 'modelo/quarto.class.php';

        if(isset($_GET['id'])){

          $resDAO = new QuartoDAO();
          $query = "where idQuarto = ".$_GET['id'];
          $array = $resDAO->filtrar($query);
          unset($_GET['id']);
        }
        ?>
        <form name="alterarquarto" method="post" action="">
          <div class="form-group">
            <input type="text" name="quarto"
                   placeholder="Código"
                   readonly="readonly"
                   class="form-control"

                   value="<?php
                          if(isset($array)){
                            echo $array[0]->idQuarto;
                          }
                          ?>">
          </div>


          <div class="form-group">
            <input type="text" name="numQuarto" placeholder="Número Quarto" class="form-control"
            id="num" value="<?php
                   if(isset($array)){
                     echo $array[0]->numQuarto;
                   }
                   ?>">
          </div>
          <div class="form-group">
            <input type="text" name="andar" placeholder="Andar" class="form-control"
            id="andar" value="<?php
                   if(isset($array)){
                     echo $array[0]->andar;
                   }
                   ?>">
          </div>
          <div class="form-group">
            <select name="status" class="form-control">
              <option value="Simples Solteiro"
              <?php
              if(isset($array)){
                if($array[0]->status == 'Simples Solteiro'){
                  echo "selected='selected'";
                }
              }
              ?>>Simples Solteiro</option>

              <option value="Simples Casal"
              <?php
              if(isset($array)){
                if($array[0]->status == 'Simples Casal'){
                  echo "selected='selected'";
                }
              }
              ?>>Simples/Casal</option>
              <option value="Padrao"
              <?php
              if(isset($array)){
                if($array[0]->status == 'Padrao'){
                  echo "selected='selected'";
                }
              }
              ?>>Padrão</option>
              <option value="Luxo"
              <?php
              if(isset($array)){
                if($array[0]->status == 'Luxo'){
                  echo "selected='selected'";
                }
              }
              ?>>Luxo</option>
              <option value="Cobertura"
              <?php
              if(isset($array)){
                if($array[0]->status == 'Cobertura'){
                  echo "selected='selected'";
                }
              }
              ?>>Cobertura</option>
            </select>
          </div>




          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary enviar">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-secundary enviar">
          </div>
        </form>
        <?php
        if(isset($_POST['alterar'])){
          include 'util/padronizacao.class.php';
          include 'util/validacao.class.php';

          $idQuarto = $_POST['quarto'];
          $numQuarto = $_POST['numQuarto'];
          $andar = $_POST['andar'];
          $status = $_POST['status'];

          if(isset($array)){
            $estado = $array[0]->estado;
          }
          $erros = array();
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
          if($status == 'Simples Solteiro'){
            $valor = 50.00;
          }else if($status == 'Simples Casal'){
            $valor = 70.00;
          }else if ($status == 'Padrao') {
            $valor = 100.00;
          }else if($status == 'Luxo'){
            $valor = 150.00;
          }else if($status == 'Cobertura'){
            $valor = 250.00;
          }else{
            $valor = 0;
          }
          if(count($erros)==0){
            $res = new Quarto();
            $res->idQuarto = $idQuarto;
            $res->numQuarto = $numQuarto;
            $res->andar =  $andar;
            $res->status = $status;
            $res->valor = $valor;
            $res->estado = $estado;

            $resDAO->alterarQuarto($res);
            header("location:consulta-quarto.php");

          }else{
            foreach ($erros as $e) {
              echo $e;
            }
          }

        }//fecha
          ?>
      </section>
    </div>
  </body>
</html>
