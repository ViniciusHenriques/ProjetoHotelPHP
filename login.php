<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Hotel - Login</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">  </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
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
                <li><a href="filtro-quarto.php">Quartos</a></li>
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

      <?php
      if(isset($_SESSION['privateUser'])){

        include_once 'modelo/funcionario.class.php';
        include_once 'modelo/hospede.class.php';
        $u = unserialize($_SESSION['privateUser']);
        $a = unserialize($_SESSION['tipo']);
        if($a=='funcionario'){
          echo "<h2>Bem-vindo ao nosso sistema, $u->nome!!</h2>";
        }else{

          echo "<h2>Olá $u->nome, seja Bem-vindo... Faça sua Reserva!!</h2>";
        }
        ?>
        <div class="form-group">


      </div>

        <div class="table-responsive col-md-6 col-md-offset-3">
    <table class="table table-striped table-bordered  table-condensed">
      <thead>
        <tr class="active">
          <th>Status do Quarto</th>
          <th>Valor</th>
        </tr>
      </thead>


      <tr class="active">
      <td>Simples/Solteiro</td>
      <td>50,00</td>
      </tr>

      <tr class="active">
      <td>Simples/Casal</td>
      <td>70,00</td>
      </tr>

      <tr class="active">
      <td>Padrão</td>
      <td>100,00</td>
      </tr>

      <tr class="active">
      <td>Luxo</td>
      <td>150,00</td>
      </tr>

      <tr class="active">
      <td>Cobertura</td>
      <td>250,00</td>
      </tr>

      <tfoot>
        <tr class="active">
          <th>Status do Quarto</th>
          <th>Valor</th>
        </tr>
      </tfoot>
    </table>
    </div>
      <?php
        if(isset($_POST['deslogar'])){
          unset($_SESSION['privateUser']);
          header("location:login.php");
        }
      } else {
      ?>
      <!-- INICIO LOGIN -->
      <section class="login" style="height: 100%">

        <h2 id="tituloLogin">Login!</h2>
        <h6 id="erro"></h6>
        <form name="login" action="" method="post">
          <div class="form-group form-inline">
            <span class="form-control inputLogin"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="text" class="form-control inputLogin" name="login" placeholder="Login">
          </div>
            <div class="form-group form-inline ">
              <span class="form-control inputLogin"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control inputLogin" name="senha" placeholder="Senha">
            </div>
            <div class="form-group form-inline">
              <span class="form-control inputLogin">Tipo</span>
              <select class="form-control inputLogin"  name="seltipo">
                <option value="hospede">Hospede</option>
                <option value="funcionario">Funcionário</option>
              </select>
          </div>


        <div class="form-group form-inline">
          <input type="submit" name="entrar" value="Entrar"
                 class="btn btn-primary">
        </div>
        <a href="cadastro-hospede.php">Cadastre-se</a>
      </form>

      <?php
      }//fecha

      if(isset($_POST['entrar'])){

        include_once 'modelo/funcionario.class.php';
        include 'util/seguranca.class.php';
        include 'modelo/hospede.class.php';



        //padronizacao

        $login = $_POST['login'];
        $senha = Seguranca::criptografar($_POST['senha']);
        $tipo = $_POST['seltipo'];

        if($tipo=='funcionario'){
          require 'dao/funcionariodao.class.php';
          $u = new Funcionario();
          $u->login = $login;
          $u->senha = $senha;
          $uDAO = new FuncionarioDAO();
          $usuario = $uDAO->verificarFuncionario($u);

        }else if($tipo=='hospede'){
          include 'dao/hospededao.class.php';
          $u = new Hospede();
          $u->login = $login;
          $u->senha = $senha;
          $uDAO = new HospedeDAO();
          $usuario = $uDAO->verificarHospede($u);

        }else{
          $usuario = null;
        }

        if($usuario && !is_null($usuario)){
          //Significa que login tá certo!

          $_SESSION['tipo'] = serialize($tipo);
          $_SESSION['login'] = serialize($login);
          $_SESSION['privateUser'] = serialize($usuario);
          header("location:login.php");
        }else{
          ?>
          <script type="text/javascript">
            function loginRed(){
              document.getElementById("tituloLogin").style.color = '#8A0808';
              erro.innerText = "Login/Senha incorreto(s)... Tente novamente!";
            }
            loginRed();
          </script>
          <?php
          
        }

        unset($_POST['entrar']);
      }//fecha if
      ?>

      </section>
    </div>
  </body>
</html>
