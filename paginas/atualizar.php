<?php
    
    //Entrada das consultar médicos pelo CRM

    if(isset($_GET["crm"])){
        require_once '../manipularDb/manipuladorDB.php';
        $acessoDb = new manipuladorDB;
        $acessoDb->conectarBanco();
        $retornoMedico = $acessoDb->listarMedicoCrm($_GET["crm"]);
        if($retornoMedico){
            $crm = $retornoMedico["crm"];
            $nome = $retornoMedico["nome"];
            $idade = $retornoMedico["idade"];
            $genero = $retornoMedico["genero"];
            $especialidade = $retornoMedico["especialidade"];
        }else{
            header('location:./consultar.php');
        }
    }

    //Entrada das consultar de médicos pelo Nome

    if(isset($_GET["nome"])){
        require_once '../manipularDb/manipuladorDB.php';
        $acessoDb = new manipuladorDB;
        $acessoDb->conectarBanco();
        $retornoMedico = $acessoDb->listarMedicoNome($_GET["nome"]);
        if($retornoMedico){
            $crm = $retornoMedico["crm"];
            $nome = $retornoMedico["nome"];
            $idade = $retornoMedico["idade"];
            $genero = $retornoMedico["genero"];
            $especialidade = $retornoMedico["especialidade"];
        }else{
            header('location:./consultar.php');
        }
    }

    // Recebimento de dados atualizados nesta página

    if(isset($_GET["crm"]) && isset($_GET["novoNome"]) || isset($_GET["novaIdade"]) || isset($_GET["novoGenero"]) || isset($_GET["novaEspecialidade"])){
        if ($_GET["novoNome"] != "" || $_GET["novaIdade"] != "" || $_GET["novoGenero"] != "" || $_GET["novaEspecialidade"] != "")
        
        $crm = addslashes($_GET["crm"]);
        $novoNome = addslashes($_GET["novoNome"]);
        $novaIdade = addslashes($_GET["novaIdade"]);
        $novoGenero = addslashes($_GET["novoGenero"]);
        $novaEspecialidade = addslashes($_GET["novaEspecialidade"]);
        
        if($novoNome == ""){
            $novoNome = $nome;
        }
        
        if($novaIdade == ""){
            $novaIdade = $idade;
        }

        if($novoGenero == ""){
            $novoGenero = $genero;
        }

        if($novaEspecialidade == ""){
            $novaEspecialidade = $especialidade;
        }


        require_once '../manipularDb/manipuladorDB.php';
        $acessoDb = new manipuladorDB;
        $acessoDb->conectarBanco();
        $acessoDb->atualizarMedico($crm, $novoNome, $novaIdade, $novoGenero, $novaEspecialidade);
    }

?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro</title>
    <link rel="stylesheet" href="../style/fontes.css"/>
    <link rel="stylesheet" href="../style/stylePaginas.css"/>
</head>
<body>
    <header>    
        <a href="../index.php"><img src="https://logowik.com/content/uploads/images/albert-einstein-hospital6256.jpg"/></a>
    </header>

    <main>

        <section>
            <form action="" method="GET">
                <h3> CRM <?php echo $crm;?> </h3>
                <input id="inputCrm"name="crm" type="text" value= "<?php echo $crm;?>" placeholder="<?php echo $crm;?>"/>
                
                <small> Nome </small>
                <input name="novoNome" type="text" placeholder="<?php echo $nome;?>"/>

                <small> Idade </small>
                <input name="novaIdade" type="text" placeholder="<?php echo $idade;?>"/>

                <small> M (masculino) ou F (feminino) </small>
                <input name="novoGenero" type="text" placeholder="<?php echo $genero;?>"/>

                <small> Especialidade </small>
                <input name="novaEspecialidade" type="text" placeholder="<?php echo $especialidade;?>"/>
                <input type="submit" value="Atualizar Cadastro">
            </form>
        </section>
        
        <section id="sessaoNavegacao">
            <div>
                <a href="./consultar.php"><button> Nova Consulta </button></a>
                <a href="./excluir.php?crm=<?php echo $crm; ?>"><button> Excluir Cadastro </button></a>
            </div>    
        </section>
    </main>

</body>
</html>
  