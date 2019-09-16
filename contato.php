<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Hotel - Página Inicial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <fieldset>
      <legend>FALE CONOSCO</legend>


      <form name="contato" method="post" action="">

        <div class="form-group ">
          <span class="form-control"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" name="txtnome" class="form-control" placeholder="Digite o seu nome">
        </div>
        <div class="form-group">
          <span class="form-control"><i class="glyphicon glyphicon-earphone"></i></span>
          <input type="text" name="txtemail" class="form-control" placeholder="Digite seu email">
        </div>

        <div class="form-group">
          <span class="form-control"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="text" name="txttelefone" class="form-control" placeholder="Digite seu telefone">
        </div>
        <div class="form-group">

          <span class="form-control"><i class="glyphicon glyphicon-comment"></i></span>
          <textarea class="form-control" name="mensagem" rows="3" cols="23" required="" placeholder="Digite sua mensagem!!">

        </textarea>
      </div>


      <div class="form-group">
          <input type="submit" name="enviar" class="btn btn-info enviar" value="Enviar">
          <input type="reset" value="Limpar" class="btn btn-secundy enviar">
      </div>
    </form>

    <?php
    if(isset($_POST['enviar'])){
      include_once 'modelo/contato.class.php';
      include_once 'util/validacao.class.php';
      include_once 'util/email.class.php';

      $nome = $_POST['txtnome'];
      $email = $_POST['txtemail'];
      $telefone = $_POST['txttelefone'];
      $msg = $_POST['mensagem'];

      if(!Validacao::validarNome($nome) ||
        !Validacao::validarEmail($email) ||
        !Validacao::validarTelefone($telefone)){

          echo "<h2>Dado(s) inválido(s)</h2>";

        }else{
          $c = new Contato($nome,$email,$telefone,$msg);

          //Montando a mensagem que será enviada por email
          $mensagem = "Nome: $c->nome #### Email: $c->email #### telefone: $c->telefone #### Mensagem: $c->msg ";

          /*Instanciando objeto $e a partir da classe Email. Enviando a mensagem pelo construtor*/
          $e = new Email($mensagem);
          //Chamando o método que enviará o email
          $e->enviarEmail();

          echo "<h2>Email enviado com sucesso!</h2>";
        }//fecha else
      }
      ?>
    </fieldset>



    </div>
  </body>
</html>
