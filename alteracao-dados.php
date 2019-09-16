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
    <title>Hotel - Alterar Hospede</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                      <span class="form-inline" style="color:white"><i class="glyphicon glyphicon-log-in"></i>
                      <input type="submit" name="deslogar" class="btn btn-default" value="Sair"></span>
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
              <span class="form-inline" style="color:white"><i class="glyphicon glyphicon-log-in"></i>
              <input type="submit" name="deslogar" class="btn btn-default" value="Login"></span>
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
    <h2>Alterar Hospede</h2>
      <?php
      include 'dao/hospededao.class.php';
      include 'modelo/hospede.class.php';

      if(isset($_GET['id'])){

        $hosDAO = new HospedeDAO();
        $query = "where idHospede = ".$_GET['id'];
        $array = $hosDAO->filtrar($query);
        unset($_GET['id']);
      }
      ?>
      <form name="alterarhospede" method="post" action="">
        <div class="form-group">
          <input type="text" name="txtidhos"
                 placeholder="Código"
                 readonly="readonly"
                 class="form-control"
                 value="<?php
                        if(isset($array)){
                          echo $array[0]->idHospede;
                        }
                        ?>">
        </div>
        <div class="form-group">
          <input type="text" name="nome"
          placeholder="Nome" class="form-control"  id="nome"
          value="<?php
                 if(isset($array)){
                   echo $array[0]->nome;
                 }
                 ?>">
        </div>

        <div class="form-group">
          <input type="text" name="cpf" placeholder="CPF" class="form-control"  id="cpf"
          value="<?php
                 if(isset($array)){
                   echo $array[0]->cpf;
                 }
                 ?>">
        </div>

        <div class="form-group">
          <select name="sexo" class="form-control">
            <option value="Masculino"
            <?php
            if(isset($array)){
              if($array[0]->sexo == 'Masculino'){
                echo "selected='selected'";
              }
            }
            ?>>Masculino</option>

            <option value="Feminino"
            <?php
            if(isset($array)){
              if($array[0]->sexo == 'Feminino'){
                echo "selected='selected'";
              }
            }
            ?>>Feminino</option>
          </select>
        </div>
        <div class="form-group">
          <input type="text" name="telefone" placeholder="Telefone" class="form-control"  id="tel"
          value="<?php
                 if(isset($array)){
                   echo $array[0]->telefone;
                 }
                 ?>">
        </div>
        <div class="form-group">
          <input type="text" name="login" placeholder="Login" class="form-control"  id="login"
          value="<?php
                 if(isset($array)){
                   echo $array[0]->login;
                 }
                 ?>">
        </div>
        <div class="form-group">
          <input type="password" name="senha" placeholder="Senha" class="form-control" id="senha">
        </div>

        <div class="form-group">
          <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
          <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
        </div>
      </form>
      <?php
      if(isset($_POST['alterar'])){
          include 'util/padronizacao.class.php';
          include 'util/validacao.class.php';
          include 'util/seguranca.class.php';

          $idHospede = $_POST['txtidhos'];
          $nome = Padronizacao::padronizarMaiMin($_POST['nome']);
          $cpf = $_POST['cpf'];
          $sexo = $_POST['sexo'];
          $telefone = $_POST['telefone'];
          $login = $_POST['login'];
          $senha = $_POST['senha'];

          $erros = array();

          if(!Validacao::validarNome($nome)){
            $erros[] = "";
            ?>
            <script type="text/javascript">
            var txt = "Você digitou um Nome inválido";
              mostrarErro('nome',txt);
            </script>

            <?php
          }

          if(!Validacao::validarCPF($cpf)){
            $erros[] = "";
            ?>
            <script type="text/javascript">
            var txt = "Você digitou um Cpf inválido";
              mostrarErro('cpf',txt);
            </script>

            <?php
          }
          if(!Validacao::validarSexo($sexo)){
            $erros[] = "<h6>Sexo inválido</h6>";
          }
          if(!Validacao::validarTelefone($telefone)){
            $erros[] = "";
            ?>
            <script type="text/javascript">
            var txt = "Você digitou um telefone inválido";
              mostrarErro('tel',txt);
            </script>

            <?php
          }
          if(!Validacao::validarLogin($login)){
            $erros[] = "";
            ?>
            <script type="text/javascript">
            var txt = "Você digitou um login inválido";
              mostrarErro('login',txt);
            </script>

            <?php
          }
          if(!Validacao::validarSenha($senha)){
            $erros[] = "";
            ?>
            <script type="text/javascript">
            var txt = "Você digitou uma senha inválido";
              mostrarErro('senha',txt);
            </script>

            <?php
          }
          $array = $hosDAO->validarHospede($login);
          foreach ($array as $a) {
            if (isset($array)) {
              $erros[] = "";
              ?>
              <script type="text/javascript">
              var txt = "Login já existente";
                mostrarErro('login',txt);
              </script>

              <?php
            }
          }




          if(count($erros)==0){
            $hos = new Hospede();
            $hos->idHospede = $idHospede;
            $hos->nome = $nome;
            $hos->cpf = $cpf;
            $hos->sexo = $sexo;
            $hos->telefone = $telefone;
            $hos->login = $login;
            $hos->senha = Seguranca::criptografar($senha);
            $hosDAO = new HospedeDAO();
            $hosDAO->alterarHospede($hos);
            $_SESSION['login'] = serialize($login);
            header("location:consulta-dados.php");


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
