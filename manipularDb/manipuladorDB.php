<?php
    class manipuladorDB{

        private $pdo;

        public function conectarBanco (){
            global $pdo;
            try{
                $pdo = new PDO("mysql:dbname=cadastroMedicos; host=localhost:8889", "root", "root");
                return $pdo;
            }catch(PDOException $e){
                $e->getMessage();
            }
            
        }

        public function cadastrarMedico ($crm, $nome, $idade, $genero, $especialidade){
            global $pdo;

            $retornoConsulta = $pdo->query("SELECT * FROM medicos WHERE crm= $crm");
            $retorno= $retornoConsulta->fetch(PDO::FETCH_ASSOC);

            if(!$retorno){
                $cadastro = $pdo->prepare("INSERT INTO medicos (crm, nome, idade, genero, especialidade) VALUES (:c, :n, :i, :g, :e)");
                $cadastro->bindValue(":c", $crm);
                $cadastro->bindValue(":n", $nome);
                $cadastro->bindValue(":i", $idade);
                $cadastro->bindValue(":g", $genero);
                $cadastro->bindValue(":e", $especialidade);
                $cadastro->execute();
                echo "<script> alert('Cadastro realizado com sucesso') </script>";
            }else{
                echo "<script> alert('Já exite um cadastro com o CRM $crm') </script>";
            }
        }

        public function listarMedico ($crm){
            global $pdo;

            if($crm){
                $retornoConsulta = $pdo->query("SELECT * FROM medicos WHERE crm= $crm");
                $retorno= $retornoConsulta->fetch(PDO::FETCH_ASSOC);
                if($retorno){
                    return $retorno;
                }else{
                    echo "<script> alert('Nenhum cadastro foi encontrado') </script>";
                }
            }
            
        }
        //Tentei consultar pelo nome ou CRM, porém não deu muito certo.. Por algum motivo também a busca de todo o banco de dados não retornava todos. Retornava apenas 2. 
        //Resolvi deixar para a parte final, assim não perco fluxo do projeto.


        public function atualizarMedico ($crm, $novoNome, $novaIdade, $novoGenero, $novaEspecialidade){
            global $pdo;

            $retornoConsulta = $pdo->query("SELECT * FROM medicos WHERE crm= $crm");
            $retorno= $retornoConsulta->fetch(PDO::FETCH_ASSOC);

            if($retorno){
                $atualizar = $pdo->prepare("UPDATE medicos set nome = :n, idade = :i, genero = :g, especialidade = :e WHERE crm= $crm");
                $atualizar->bindValue(":n", $novoNome);
                $atualizar->bindValue(":i", $novaIdade);
                
                if($novoGenero == "M" || $novoGenero == "F"){
                    $atualizar->bindValue(":g", $novoGenero);
                }
                
                $atualizar->bindValue(":e", $novaEspecialidade);
                $atualizar->execute();
                header("location:../paginas/atualizar.php?crm=$crm");
                echo "<script> alert('Alterado com sucesso') </script>";
            }else{
                echo "<script> alert('Nenhum cadastro foi encontrado') </script>";
            }
            
        }

        public function removerMedico ($crm){
            global $pdo;
            $retornoConsulta = $pdo->query("DELETE FROM medicos WHERE crm= $crm");
        }


    }

?>