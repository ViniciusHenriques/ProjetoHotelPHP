<?php
require 'conexaobanco.class.php';
  class QuartoDAO{
    private $conexao = null;
    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}

    public function cadastrarQuarto($qua){
      try{
        $stat = $this->conexao->prepare("insert into quarto(idQuarto,numQuarto,status,valor,andar,idHospede,idReserva,idFuncionario)values(null,?,?,?,?,?,?,?)");

        $stat->bindValue(1,$qua->numQuarto);
        $stat->bindValue(2,$qua->status);
        $stat->bindValue(3,$qua->valor);
        $stat->bindValue(4,$qua->andar);
        $stat->bindValue(5,0);
        $stat->bindValue(6,0);
        $stat->bindValue(7,0);

        $stat->execute();
      }catch(PDOException $e){
        echo "Erro ao cadastrar! ".$e;
      }

    }
    public function buscarQuarto(){
      try {
        $stat = $this->conexao->query("select * from quarto");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'quarto');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Quartos!".$pe;
      }
    }//fecha método
    public function buscarIdQuarto($id){
      try {
        $stat = $this->conexao->query("select * from quarto where idQuarto='$id'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'quarto');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Quartos!".$pe;
      }
    }//fecha método
    public function validarQuarto($num){
      try {
        $stat = $this->conexao->query("select * from quarto where numQuarto = ".$num);
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'quarto');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Quartos!".$pe;
      }
    }//fecha método
                     //where idlivro=1
    public function filtrar($query){
      try{
        $stat=$this->conexao->query("select * from quarto ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Quarto');
        return $array;
      }catch(PDOException $e){
        echo "Erro ao filtrar! ".$e;
      }//fecha catch
    }//fecha filtrar

    public function deletarQuarto($id,$idR){
      try {
        $stat = $this->conexao->prepare(
          "delete from quarto where idQuarto = ?;
          ");
        $stat->bindValue(1,$id);

        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao excluir quarto! ".$e;
      }
    }//fecha deletarLivro
    public function alterarQuarto($qua){
      try{
        $stat=$this->conexao->prepare("update quarto set numQuarto=?,status=?,valor=?,andar=? where idQuarto=?");
        $stat->bindValue(1,$qua->numQuarto);
        $stat->bindValue(2,$qua->status);
        $stat->bindValue(3,$qua->valor);
        $stat->bindValue(4,$qua->andar);
        $stat->bindValue(5,$qua->idQuarto);
        $stat->execute();
      }catch(PDOException $e){
        echo "erro ao alterar Quarto!".$e;
      }//fechacatch
    }//fecha

    public function gerarJSON(){
      try {
        $stat = $this->conexao->query("select * from quarto");
        return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
      } catch (PDOException $pe) {
        echo "Erro ao gerar JSON".$pe;
      }
    }
    public function buscarReserva(){
      try {

        $stat = $this->conexao->query("select * from reserva ");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'reserva');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Reserva!".$pe;
      }
    }//fecha método
  }
