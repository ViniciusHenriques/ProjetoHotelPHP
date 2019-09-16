<?php
include 'dao/hospededao.class.php';
include 'modelo/hospede.class.php';


$hosDAO = new HospedeDAO();
echo $hosDAO->gerarJSON();

?>
