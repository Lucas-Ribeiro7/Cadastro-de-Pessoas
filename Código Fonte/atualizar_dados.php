<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Atualizar Dados</title>
</head>
        <?php
            require_once 'pessoa.php';
            $p = new pessoa("cadastropdo", "localhost", "root", "");
        ?>
<body>
        <?php
            $dados = $p->buscarDados();
            for($i = 0; $i < count($dados); $i++){
                foreach($dados[$i] as $key => $value){
                
                }
            }   
        ?>
        <?php
            if(isset($_GET['id_up'])){
                $id_update = addslashes($_GET['id_up']);
                $res = $p->buscarDadosPessoa($id_update);
                $id = $res['id'];
                $nome = $res['nome'];
                $telefone = $res['telefone'];
                $email = $res['email'];
            }
        ?>
    <section id="esquerda">
        <form action="" method="POST"> 
            <h2>CADASTRO DE PESSOAS</h2>
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $nome;?>" required>
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?php echo $telefone; ?>" required>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>" required>
            <input type="submit" value="Atualizar">
        </form>
    </section>
            <?php
                if(isset($_POST['nome'])){
                    $cmd = addslashes($_GET['id_up']);
                    $res = $p->buscarDadosPessoa($cmd);
                    $id = $res['id'];
                    $nome = addslashes($_POST['nome']); //ESTA FUNÇÃO FAZ A PROTEÇÃO DE CÓDIGOS MALICIOSO 
                    $telefone = addslashes($_POST['telefone']);
                    $email = addslashes($_POST['email']);
                    $p->atualizarDados($id, $nome, $telefone, $email);
                    header("location: index.php");
                    }
            ?>
    <br>

    
        <a href="index.php">Voltar</a>
    
</body>
</html>