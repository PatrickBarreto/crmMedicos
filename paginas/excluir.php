<?php
    if(isset($_GET["crm"])){
        require_once '../manipularDb/manipuladorDB.php';
        $acessoDb = new manipuladorDB;
        $acessoDb->conectarBanco();
        $retornoMedico = $acessoDb->removerMedico($_GET["crm"]);
        header('location:./consultar.php');
    }
?>