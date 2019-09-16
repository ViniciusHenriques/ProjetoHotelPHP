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
    <title>Hotel - Consulta Hospede</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

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
              <li><a href="cadastro-reserva.php">Fazer Reserva</a></li>
              <li><a href="filtro-quarto.php">Quartos</a></li>
              <li><a href="contato.php">Contato</a> </li>
               </div>
                <div class="col-md-2 login">
                 <li class="dropdown"><span class="form-inline" style="color:white"><i class="glyphicon glyphicon-user"></i>
                 </span><a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil<span class="caret"></span></a>
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
      <?php
      include 'dao/hospededao.class.php';
      include 'modelo/hospede.class.php';
      $hosDAO = new HospedeDAO();
      $login = unserialize($_SESSION['login']);
      $array2 = $hosDAO->consultaHospede($login);
      if(count($array2) != 0){
      ?>
      <div class="col-md-6 col-md-offset-3 dados" style="color:white;text-align:center;">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script>
            $(function(){
                 $("#btn-mensagem").click(function(){
                $("#modal-mensagem").modal();
            });
          });
      </script>
      <h2>Seus dados!</h2>

      <?php
      foreach($array2 as $a){
          echo "<h3>Seu Código é $a->idHospede</h3>";
          echo "<h3>Nome: $a->nome</h3>";
          echo "<h3>CPF: $a->cpf</h3>";
          echo "<h3>Sexo: $a->sexo</h3>";
          echo "<h3>Telefone: $a->telefone</h3>";
          echo "<h3>Login: $a->login</h3>";

          echo "<a href='alteracao-dados.php?id=$a->idHospede'><img class='iconeConsulta' src='imagens/alterar.png' title='Altere seu cadastro'></a>";
        
          
          if ($a->numRes == 0) {
                echo "<a id='btn-mensagem'><img class='iconeConsulta' src='imagens/delete.png' title='Excluir conta'></a>";
                echo "<div class='modal fade' id='modal-mensagem'>
                          <div class='modal-dialog'>
                               <div class='modal-content'>
                                   <div class='modal-header'>
                                       <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
                                       
                                       <h4 class='modal-title'>HOTEL</h4>
                                   </div>
                                   <div class='modal-body'>
                                       <p>Tem certeza que deseja excluir sua conta Sr. $a->nome ?</p>
                                   </div>
                                   <div class='modal-footer'>
                                       <a class='btn btn-danger col-md-3 col-md-offset-3' href='consulta-dados?id=$a->idHospede'>SIM</a>
                                       <a class='btn btn-danger col-md-3' data-dismiss='modal' >NÃO</a>
                                   </div>
                               </div>
                           </div>
                       </div>";
          }else{
            
                echo "<a id='btn-mensagem'><img class='iconeConsulta' src='imagens/delete.png'></a>";

                      echo "<div class='modal fade' id='modal-mensagem'>
                                <div class='modal-dialog'>
                                     <div class='modal-content'>
                                         <div class='modal-header'>
                                             <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
                                             
                                             <h4 class='modal-title'>HOTEL</h4>
                                         </div>
                                         <div class='modal-body'>
                                             <p>Sr. $a->nome, você tem reservas feitas! Tem certeza que deseja excluir sua conta?</p>
                                         </div>
                                         <div class='modal-footer'>
                                             <a class='btn btn-danger col-md-3 col-md-offset-3' href='consulta-dados?id=$a->idHospede'>SIM</a>
                                             <a class='btn btn-danger col-md-3' data-dismiss='modal' >NÃO</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>";
          }

        }
        ?>

      </div>
      <?php
    }else{
      echo "<h2>Não há dados no banco de dados!</h2>";
    }
    if(isset($_GET['id'])){
      $hosDAO = new HospedeDAO();
      $hosDAO->deletarHospede($_GET['id']);
      unset($_SESSION['privateUser']);
      header("location:login.php");
    }
      ?>
    </div>

  </body>
</html>
