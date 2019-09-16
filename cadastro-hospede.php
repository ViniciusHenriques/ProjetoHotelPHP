<?php
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <title>Hotel - Cadastro Hospede</title>
    <meta http-equiv="Cache-Control" content="no-store" />
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

      <div class="col-md-12">
        <h2>Cadastro de Hospede</h2>
        <form name="cadhos" action="" method="post">
          <div class="form-group">
            <div class="form-inline">
          
            <input type="text" name="nome" placeholder="Nome" class="form-control nome" pattern="^[A-zÀ-ú ]{2,15}$" id="nome" >

            <input type="text" name="snome" placeholder="Sobrenome" class="form-control nome" pattern="^[A-zÀ-ú ]{2,15}$" id="sobre" >

          </div>
          </div>
          <div class="form-group">
            <input type="text" name="cpf" placeholder="CPF" class="form-control" pattern="^\d{3}\.\d{3}\.\d{3}-\d{2}$" id="cpf">

          </div>
          <div class="form-group">
            <div class="form-inline">
            <select name="sexo" class="form-control tel" id="selSex">
              <option value="selecione">Selecione o sexo</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>

            </select>
          
            <input type="text" name="telefone" placeholder="Telefone" class="form-control tel" pattern="^[0-9()-]{8,15}$" id="tel">

          </div>
          </div>
          <div class="form-group">
            <input type="text" name="login" placeholder="Login" class="form-control" pattern="^[a-z_-.0-9@]{3,15}$" id="login">

          </div>
          <div class="form-group">
            <input type="password" name="senha" placeholder="Senha" class="form-control" pattern="^[0-9a-z]{3,15}$" id="senha">

          </div>
        </div>


        <div class="form-group">
          <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-info enviar ">
          <input type="reset" name="limpar" value="Limpar" class="btn btn-secundy enviar"  onclick="voltar()">
        </div>
      </form>
</div>


      <?php
      if(isset($_POST['cadastrar'])){
        include 'modelo/hospede.class.php';
        include 'util/padronizacao.class.php';
        include 'util/validacao.class.php';
        include 'dao/hospededao.class.php';
        include 'util/seguranca.class.php';


        $nome = Padronizacao::padronizarMaiMin(Padronizacao::juntarNome($_POST['nome'],$_POST['snome']));
        $cpf = $_POST['cpf'];
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $erros = array();

        if(!Validacao::validarNome($_POST['nome'])){
          $erros[] = " ";
          ?>
          <script type="text/javascript">
          var txt = "Você digitou um Nome inválido";
            mostrarErro('nome',txt);
          </script>

          <?php
        }
        if(!Validacao::validarNome($_POST['snome'])){
          $erros[] = "";
          ?>
          <script type="text/javascript">
            var txt = "Você digitou um sobrenome inválido";
            mostrarErro('sobre',txt);
          </script>

          <?php
        }
        if(!Validacao::validarCPF($cpf)){
          $erros[] = "";
          ?>
          <script type="text/javascript">
          var txt = "Você digitou um CPF inválido";
            mostrarErro('cpf',txt);
          </script>

          <?php
        }
        if($_POST['sexo']=='selecione'){
          $erros[] = "";
          ?>
          <script type="text/javascript">
          var txt = "";
            mostrarErro('selSex',txt);
          </script>

          <?php

        }
        if(!Validacao::validarTelefone($telefone)){
          $erros[] = "Selecione o sexo";
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
          var txt = "Você digitou um senha inválido";
            mostrarErro('senha',txt);
          </script>

          <?php
        }
        $hosDAO = new HospedeDAO;
        $hos = new Hospede();
        $array = $hosDAO->validarHospede($login);
        foreach ($array as $a) {
          if (isset($array)) {
            $erros[] = "";
            ?>
            <script type="text/javascript">
            var txt = "Login já existente!Tente novamente!";
              mostrarErro('login',txt);
            </script>

            <?php
          }
        }


        if(count($erros)==0){
          $hos->nome = $nome;
          $hos->cpf = $cpf;
          $hos->sexo = $sexo;
          $hos->telefone = $telefone;
          $hos->login = $login;
          $hos->senha = Seguranca::criptografar($senha);
          $hosDAO->cadastrarHospede($hos);
          echo "<h2>Cadastro feito com sucesso!!!</h2>";
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
