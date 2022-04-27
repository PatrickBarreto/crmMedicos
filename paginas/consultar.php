<?php
    require_once '../manipularDb/manipuladorDB.php';
    $acessoDb = new manipuladorDB;
    $acessoDb->conectarBanco();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cadastros</title>
    <link rel="stylesheet" href="../style/fontes.css"/>
    <link rel="stylesheet" href="../style/stylePaginas.css"/>

</head>
<body>
    <header>    
        <a href="../index.php"><img src="https://logowik.com/content/uploads/images/albert-einstein-hospital6256.jpg"/></a>
    </header>
    
    <main>

        <section>

            <!-- Filtrar para atualizar pelo CRM-->
            <form class="formBusca" action="./atualizar.php" method="GET">
                <h3>Consultar e atualizar cadastro CRM</h3>
                <input name="crm" type="text" maxlength="6"/>
                <input type="submit" value="Consultar e Atualizar"/>
            </form>
            
            <!-- Filtrar para atualizar pelo Nome-->
            <form class="formBusca" action="./atualizar.php" method="GET">
                <h3>Consultar e atualizar cadastro por nome</h3>
                <input name="nome" type="text" maxlength="50"/>
                <input type="submit" value="Consultar e Atualizar"/>
            </form>

            <!-- Filtrar pelo Nome-->
            <form class="formBusca" action="" method="GET">
                <h3>Consultar todos cadastros por nome</h3>
                <input name="nome" type="text" maxlength="50"/>
                <input type="submit" value="Consultar"/>
            </form>

            <!-- Filtrar por especialidade-->
            <form class="formBusca" action="" method="GET">
                <h3>Consultar todos cadastros por Especialidade</h3> 
                <input name="especialidade">
                <input type="submit" value="Consultar"/>
            </form>

            <div class="formBusca" id="buscaGeral">
                <h3> Consultar todos cadastros do banco </h3>
                <a href="./consultar.php?todobanco=sim#tabelaResultado"> <button id="buttonBuscaGeral"> Consultar </button> </a>
            </div> 

        <section>

        
        <section id="sessaoNavegacao">
            <div>
                <a href="../index.php"><button> Página inicial </button></a>
                <a href="./cadastrar.php"><button> Novo Cadastro </button></a>
            </div>    
        </section>
    </main>

<?php

    //Conultar todos médicos pelo nome e montar tabela no retorno

    if(isset($_GET["nome"])){
        $retornoMedico = $acessoDb->listarTodosMedicosNome($_GET["nome"]);
        
        ?>
        <table id="tabelaResultado">
            <tr>
                <th>Id</th>
                <th>CRM</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Genero</th>
                <th>Especialidade</th>
            </tr>
        <?php   
            for($i = 0 ; $i < count($retornoMedico) ; $i++){
                echo " <tr> 
                        <td>". $retornoMedico[$i]["id"]. "</td>
                        <td>". $retornoMedico[$i]["crm"]. "</td>
                        <td>". $retornoMedico[$i]["nome"]. "</td>
                        <td>". $retornoMedico[$i]["idade"]. "</td>
                        <td>". $retornoMedico[$i]["genero"]. "</td>
                        <td>". $retornoMedico[$i]["especialidade"]. "</td>
                    </tr>" ;
            } 
    }

    //Conultar todos médicos e montar tabela no retorno
    
    if(isset($_GET["todobanco"])){
        $retornoMedico = $acessoDb->listarTodosMedicos();
    
        ?>
        <table id="tabelaResultado">
            <tr>
                <th>Id</th>
                <th>CRM</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Genero</th>
                <th>Especialidade</th>
            </tr>
        <?php   
            for($i = 0 ; $i < count($retornoMedico) ; $i++){
                echo " <tr> 
                        <td>". $retornoMedico[$i]["id"]. "</td>
                        <td>". $retornoMedico[$i]["crm"]. "</td>
                        <td>". $retornoMedico[$i]["nome"]. "</td>
                        <td>". $retornoMedico[$i]["idade"]. "</td>
                        <td>". $retornoMedico[$i]["genero"]. "</td>
                        <td>". $retornoMedico[$i]["especialidade"]. "</td>
                    </tr>" ;
            }        
    }
          
    //Conultar todos médicos pela especialidade e montar tabela no retorno
    
    if(isset($_GET["especialidade"])){
        $retornoMedico = $acessoDb->listarMedicosEspecialidades($_GET["especialidade"]);
        
        ?>
        <table id="tabelaResultado">
            <tr>
                <th>Id</th>
                <th>CRM</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Genero</th>
                <th>Especialidade</th>
            </tr>
        <?php   
            for($i = 0 ; $i < count($retornoMedico) ; $i++){
                echo " <tr> 
                        <td>". $retornoMedico[$i]["id"]. "</td>
                        <td>". $retornoMedico[$i]["crm"]. "</td>
                        <td>". $retornoMedico[$i]["nome"]. "</td>
                        <td>". $retornoMedico[$i]["idade"]. "</td>
                        <td>". $retornoMedico[$i]["genero"]. "</td>
                        <td>". $retornoMedico[$i]["especialidade"]. "</td>
                    </tr>" ;
            } 
    }
?>

</body>
</html>


