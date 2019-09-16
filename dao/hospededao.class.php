<?php
require 'conexaobanco.class.php';

  class HospedeDAO{
    private $conexao = null;
    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}
    public function cadastrarHospede($hos){
        try{
          $stat = $this->conexao->prepare("insert into hospede(idHospede,nome,cpf,sexo,telefone,login,senha,numRes)values(null,?,?,?,?,?,?,?)");
          $stat->bindValue(1,$hos->nome);
          $stat->bindValue(2,$hos->cpf);
          $stat->bindValue(3,$hos->sexo);
          $stat->bindValue(4,$hos->telefone);
          $stat->bindValue(5,$hos->login);
          $stat->bindValue(6,$hos->senha);
          $stat->bindValue(7,$hos->numRes);
          $stat->execute();

        }catch(PDOException $e){
          echo "Erro ao cadastrar! ".$e;
        }

      }

    public function buscarHospede(){
      try {
        $stat = $this->conexao->query("select * from hospede");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'hospede');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Hospedes!".$pe;
      }
    }//fecha método
    public function consultaHospede($login){
      try {
        $stat = $this->conexao->query("select * from hospede where login='$login'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'hospede');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar Hospedes!".$pe;
      }
    }//fecha método
                     //where idlivro=1
    public function filtrar($query){
      try{
        $stat=$this->conexao->query("select * from hospede ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'hospede');
        return $array;
      }catch(PDOException $e){
        echo "Erro ao filtrar! ".$e;
      }//fecha catch
    }//fecha filtrar

    public function deletarHospede($id){
      try {
        $stat = $this->conexao->prepare(
          "delete from hospede where idHospede = ?;
          delete from reserva where idHospede=?;
          update quarto set estado=?, idHospede=?, idReserva= ? where idHospede=?;");
        $stat->bindValue(1,$id);
        $stat->bindValue(2,$id);
        $stat->bindValue(3,"Vago");
        $stat->bindValue(4,0);
        $stat->bindValue(5,0);
        $stat->bindValue(6,$id);
        $stat->execute();
      } catch(PDOException $e) {
        echo "Erro ao excluir hospede! ".$e;
      }
    }//fecha deletarLivro
    public function alterarHospede($hos){
      try{
        $stat=$this->conexao->prepare("update hospede set nome=?,cpf=?,sexo=?, telefone=?, login=?, senha=? where idHospede=?");
        $stat->bindValue(1,$hos->nome);
        $stat->bindValue(2,$hos->cpf);
        $stat->bindValue(3,$hos->sexo);
        $stat->bindValue(4,$hos->telefone);
        $stat->bindValue(5,$hos->login);
        $stat->bindValue(6,$hos->senha);
        $stat->bindValue(7,$hos->idHospede);
        $stat->execute();
      }catch(PDOException $e){
        echo "erro ao alterar hospede!".$e;
      }//fechacatch
    }//fecha

    public function verificarHospede($u){
      try {
          $stat = $this->conexao->query("select * from hospede where login='$u->login' and senha='$u->senha'");
          $usuario = null;
          $usuario = $stat->fetchObject('hospede');
          return $usuario;
      } catch (PDOException $ex) {
          echo 'Erro ao verificar! '.$ex;
      }//fecha catch
    }
    public function gerarJSON(){
      try {
        $stat = $this->conexao->query("select * from hospede");
        return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
      } catch (PDOException $pe) {
        echo "Erro ao gerar JSON".$pe;
      }
    }
    public function validarHospede($login){
      try {
        $stat = $this->conexao->query("select * from hospede where login = '$login'");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'hospede');
        return $array;//NÃO ESQUECER
      }catch(PDOException $pe){
        echo "erro ao buscar !".$pe;
      }
    }//fecha método



  }
