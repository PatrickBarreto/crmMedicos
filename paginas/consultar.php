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

        <section id="filtrosEpecíficos">
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
                <a href="./consultar.php?todobanco=sim"> <button id="buttonBuscaGeral"> Consultar </button> </a>
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
    if(isset($_GET["nome"])){
        $retornoMedico = $acessoDb->listarTodosMedicosNome($_GET["nome"]);
        
        foreach($retornoMedico as $linhaTabela){
            echo "<pre>";
            var_dump($linhaTabela);
            echo "<pre>";
        }
    }

    if(isset($_GET["todobanco"])){
        $retornoMedico = $acessoDb->listarTodosMedicos();
        
        foreach($retornoMedico as $linhaTabela){
            echo "<pre>";
            var_dump($linhaTabela);
            echo "<pre>";
        }
        
        
    }

    if(isset($_GET["especialidade"])){
        $retornoMedico = $acessoDb->listarMedicosEspecialidades($_GET["especialidade"]);
        
        foreach($retornoMedico as $linhaTabela){
            echo "<pre>";
            var_dump($linhaTabela);
            echo "<pre>";
        }
    }
?>

</body>
</html>


