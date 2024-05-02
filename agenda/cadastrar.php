<?php
include 'conexao.php';
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
// exit;
 if ($_SERVER ['REQUEST_METHOD'] == "POST")  {
    // capturar os dados digitado no  form e salva em variaveis
    // para  facilitat a manipulação do dados
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];


// vamos abrir a conexao com o banco de dados
$conexaoComBanco = abrirBanco();

// vamos criar o sql para realizar o insert do dados no BD
$sql = "INSERT INTO pessoas
        (nome, sobrenome, nascimento, endereco, telefone)
        VALUES
        ('$nome',  '$sobrenome',  '$nascimento',  '$endereco', '$telefone')";

        if ($conexaoComBanco->query($sql) === TRUE ) {
            echo ":) Sucesso ao cadastrar o contado :)";
        } else {
            echo ":( Erro ao cadastrar o contado :(";
        }
 }
 fecharBanco($conexaoComBanco);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <h1>Agenda de contatos</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar.php">cadastrar</a></li>
       </ul>
    </nav>
    </header>
    <section>
        <h2>Cadastrar contatos</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nome">Nome</label>
            <input type="text"id ="nome" name="nome" required>  

            <label for="sobrenome">Sobrenome</label>
            <input type="text"id ="sobrenome" name="sobrenome" required>  

            <label for="nascimento">Nascimento</label>
            <input type="date"id ="nascimento" name="nascimento" required>    
            
            <label for="endereco">Endereco</label>
            <input type="text"id ="endereco" name="endereco" required>    

            <label for="telefone">Telefone</label>
            <input type="text"id ="telefone" name="telefone" required> 
            
            <button type="submit">Cadastrar</button>
               
        </form>
    </section>
</body>
</html>