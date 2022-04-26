<?php
    if(isset($_GET["crm"]) && isset($_GET["nome"]) && isset($_GET["idade"])  && isset($_GET["genero"]) && isset($_GET["especialidade"])){
        $numeroCRM = addslashes($_GET["crm"]);
        $nomeMedico = addslashes($_GET["nome"]);
        $idadeMedico = addslashes($_GET["idade"]);
        $generoMedico = addslashes($_GET["genero"]);
        $especialidadesMedico = addslashes($_GET["especialidade"]);

        require_once '../manipularDb/manipuladorDB.php';
        $acessoDb = new manipuladorDB;
        $acessoDb->conectarBanco();
        $comando = $acessoDb->cadastrarMedico($numeroCRM, $nomeMedico, $idadeMedico, $generoMedico,  $especialidadesMedico);
    
    }else{
        echo "<script> alert(Cadastro incompleto) </script>";
    }
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médicos</title>
    <link rel="stylesheet" href="../style/fontes.css"/>
    <link rel="stylesheet" href="../style/stylePaginas.css"/>
</head>
<body>
    <header>    
        <img src="https://logowik.com/content/uploads/images/albert-einstein-hospital6256.jpg"/>
    </header>

    <main>
        <section id="sessao1">
            <h1> Cadastro de Médicos </h1>
        </section>

        <section>
            <form action="" method="GET">
                <label> Número do CRM </label>
                <input name="crm" type="text" maxlength="6"/>
                
                <label> Nome </label>
                <input name="nome" type="text" maxlength="50"/>

                <label> Idade </label>
                <input name="idade" type="number" maxlength="3"/>

                <label> Genero </label>
                <select name="genero">
                    <option value="M"> Masculino </option>
                    <option value="F"> Feminino </option>
                </select>

                <div id="especialidades">
                    <h3> Especialidade </h3>
                    
                    <input id="pediatria" name="especialidade" type="radio" value="pediatria"/>
                    <label for="pediatria">Pediatria</label>
                    
                    <input id="oftalmologia" name="especialidade" type="radio" value="oftalmologia"/>
                    <label for="oftalmologia">Oftalmologia</label>
                    
                    <input id="cardiologia" name="especialidade" type="radio" value="cardiologia"/>
                    <label for="cardiologia">Cardiologia</label>
                    
                    <input id="pneumologia" name="especialidade" type="radio" value="pneumologia"/>
                    <label for="pneumologia">Pneumologia</label>
                    
                    <input id="neurologia" name="especialidade" type="radio" value="neurologia"/>
                    <label for="neurologia">Neurologia</label>
                    
                    <input id="ortopedia" name="especialidade" type="radio" value="ortopedia"/>
                    <label for="ortopedia">Ortopedia</label>
                    
                    <input id="fonoaldiologia" name="especialidade" type="radio" value="fonoaldiologia"/>
                    <label for="fonoaldiologia">Fonoaldiologia</label>
                </div>

                <input type="submit" value="Cadastrar"/> 
            </form>
        </section>
    
        <section id="sessaoNavegacao">
            <div>
                <a href="../index.php"><button> Página inicial </button></a>
                <a href="./consultar.php"><button> Gerenciar Cadastros </button></a>
            </div>    
        </section>
    </main>
</body>
</html>