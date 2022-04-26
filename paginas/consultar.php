<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cadastros</title>
    <link rel="stylesheet" href="../style/fontes.css"/>
    <link rel="stylesheet" href="../style/stylePaginas.css"/>

</head>
<body>
    <header>    
        <img src="https://logowik.com/content/uploads/images/albert-einstein-hospital6256.jpg"/>
    </header>
    
    <main>
        <form action="./atualizar.php" method="GET">
            <h3>Consultar CRM</h3>
            <input name="crm" type="text" maxlength="6"/>
            <input type="submit" value="Consultar"/>
        </form>
    
        <section id="sessaoNavegacao">
            <div>
                <a href="../index.php"><button> Página inicial </button></a>
                <a href="./cadastrar.php"><button> Novo Cadastro </button></a>
            </div>    
        </section>
    </main>


</body>
</html>