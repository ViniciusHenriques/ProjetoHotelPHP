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
      <title>Hotel - Consulta Quarto</title>
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
                    <span class="form-inline btn-default" style="color:white"><i class="glyphicon glyphicon-log-in"></i>
                    <input type="submit" name="deslogar" class="btn btn-default" value="Sair" style="font-size: 30px;margin-top: -5px;"></span>
                  </form></a>
              </div>
            <?php
          }else if($u == 'hospede'){
              ?>
                <li><a href="index.php">Página Inicial</a></li>
                <li><a href="cadastro-hospede.php">Cadastrar Hospede</a></li>
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
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              
        <?php
        include 'dao/quartodao.class.php';
        include 'modelo/quarto.class.php';
        include 'modelo/reserva.class.php';

        $hosDAO = new QuartoDAO();
        $array = $hosDAO->buscarQuarto();

        if(count($array) != 0){


        ?>
        <h2>Consulta de Quarto</h2>
        <div class="table-responsive">
          <table class="table table-striped table-bordered bg-link table-hover table-condensed">
            <thead>
              <tr class="active">
                <th colspan="2">Quarto</th>
                <th>Código</th>
                <th>Número</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>ID Funcionario</th>
                <th>ID Hospede</th>
                <th>ID Reserva</th>


              </tr>
            </thead>

            <tfoot>
              <tr class="active">
                <th colspan="2">Quarto</th>
                <th>Código</th>
                <th>Número</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>ID Funcionario</th>
                <th>ID Hospede</th>
                <th>ID Reserva</th>
              </tr>
            </tfoot>

            <tbody>
             

              <?php
              $id = 0;
              
              $datas = $hosDAO->buscarReserva();
              foreach($array as $a){
                 foreach ($datas as $e) {
                  $estado = "Vago";
                  date_default_timezone_set('America/Sao_Paulo');
                  $date = date('Y-m-d');
                  for ($i=0; $i < count($datas) ; $i++) { 
                    if($a->idQuarto == $e->idQuarto){
                      if($date >= $e->dataentrada && $date<= $e->datasaida){
                        $estado = "Ocupado";
                        $saida = " até ".$e->datasaida;
                      }else{
                        $estado = "Vago";
                      }
                    }
                  }
                 }   
                 ++$id;
                
                    if ($estado=='Ocupado') {
                      echo "<tr class='danger'>";
                        echo "<td><a href='alterar-quarto.php?id=$a->idQuarto'><img src='imagens/alterar.png' title='Alterar'></a></td>";
                        echo "<td><a href='#'><img src='imagens/bloq.png' title='Este quarto está ocupado'></a></td>";
                        echo "<td>$a->idQuarto</td>";
                        echo "<td>$a->numQuarto</td>";
                        if ($a->status == 'Padrao') {
                          echo "<td>Padrão</td>";
                        }else{
                          echo "<td>$a->status</td>"; 
                        }
                        echo "<td>$a->valor</td>";
                        echo "<td >Ocupado</td>";

                        echo "<td>$a->idFuncionario</td>";
                        echo "<td>$a->idHospede</td>";
                        echo "<td>$a->idReserva</td>";
                    }else{
                      echo "<tr class='active'>";
                          echo "<td><a href='alterar-quarto.php?id=$a->idQuarto'><img src='imagens/alterar.png' title='Alterar'></a></td>";
                          echo "<td><a id='btn-mensagem$id'><img src='imagens/delete.png'></a></td>";

                          echo "<div class='modal fade' id='modal-mensagem$id'>
                                    <div class='modal-dialog'>
                                         <div class='modal-content'>
                                             <div class='modal-header'>
                                                 <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
                                                 <h4 class='modal-title'>HOTEL</h4>
                                             </div>
                                             <div class='modal-body'>
                                                 <p>Tem certeza que deseja excluir o quarto número $a->numQuarto ?</p>
                                             </div>
                                             <div class='modal-footer'>
                                                 <a class='btn btn-danger col-md-3 col-md-offset-3' href='consulta-quarto.php?id=$a->idQuarto'>SIM</a>
                                                 <a class='btn btn-danger col-md-3' data-dismiss='modal' >NÃO</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>";

                          echo "<td>$a->idQuarto</td>";
                          echo "<td>$a->numQuarto</td>";
                          if ($a->status == 'Padrao') {
                            echo "<td>Padrão</td>";
                          }else{
                            echo "<td>$a->status</td>"; 
                          }
                          echo "<td>$a->valor</td>";
                          echo "<td >Vago</td>";
                          echo "<td>-</td>";
                          echo "<td>-</td>";
                          echo "<td>-</td>";
                    }
                    echo "</tr>";
                    ?>
                      <script>
                        $(function(){
                          var id = <?php echo $id;?>;



                             $("#btn-mensagem"+id).click(function(){
                                $("#modal-mensagem"+id).modal();

                              });
                          
                      });
                    </script>
                    <?php
                  }
                ?>
            </tbody>
          </table>
        </div>
        <?php
      }else{
        echo "<h2>Não há dados no banco de dados!</h2>";
      }
    if(isset($_GET['id'])){
          $hosDAO->deletarQuarto($_GET['id']);
          header("location:consulta-quarto.php");
      }
        ?>
      </div>

      
     
      
    </body>
  </html>
