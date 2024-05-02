<?php
//sempre que abrir um php tem que colocar esses codigo
//incluir o conexao na pagina e todo o seu conteudo
include 'conexao.php';
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
    <h2>Lista de contatos</h2>
    <table>
        <thead>
            <tr>
                <td>
                   <td>ID</td>
                   <td>Nome</td>
                   <td>Sobrenome</td>
                   <td>Nascimento</td>
                   <td>Telefone</td>
                   <td>Ações</td>;
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            //abrir conexao com o banco de dados
            $conexaoComBanco = abrirBanco();
            //preparar a consulta SQL para selecionar os dados de BD
            $query = "SELECT id, nome, sobrenome, nascimento, endereco, telefone from pessoa"; 
            //Executar a query (o sql no banco)
            $result = $conexaoComBanco -> query($query);
            $registros = $result ->fetch_assoc();
            //verificar se a query retornou registro
            if ($result->num_rows > 0)
                //    //tem registro no banco
                while ($registro = $result->fetch()) {
                    ?>
                    <tr>
                        <td><?=$registros['id']?></td>
                        <td><?=$registros['nome']?></td>
                        <td><?=$registros['sobrenome']?></td>
                        <td><?=date("d/m/Y", strtotime ($registro['nascimento'])) ?></td>
                        <td><?=$registros['endereco']?></td>
                        <td><?=$registros['telefone']?></td>
                        <td>
                            <a href="#">Editar</a>
                            <a href="#">Excluir</a>

                            
                        </td>
                    </tr>
                    <?php
                }
            //criar um laço de repetição para preencher linha por tabela
            ?>
        </tbody>
    </table>
  </section>
</body>
</html>