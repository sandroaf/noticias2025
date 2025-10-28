<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo.css">
    <title>Altera Notícia</title>
</head>
<body>
    <main>
        <?php
            //Carregar conexao com banco de dados
            if (!isset($_GET['id'])) {
                header("Location: index.php");
            }
            require_once("conexao.php");
            try {
                $stmt = $conn->prepare("SELECT * FROM noticia WHERE id = :id");
                $parametro = ["id" => $_GET['id']];
                $stmt->execute($parametro);
                $noticia = $stmt->fetch(PDO::FETCH_ASSOC); 
            } catch (Exception $e) {
                echo "ERRO ao alterar notícia: ".$e->getMessage();
            }
        ?>
        <h1 class="titulo">Altera Notícia</h1>
        <br>
        <form action="alteranoticiasalva.php" method="POST">
            <label for="iid">Id:</label>
            <input type="text" name="iid" id="iid" size="5" readonly value="<?=$noticia['id']?>">
            <br>
            <label for="ititulo">Título:</label>
            <input type="text" name="ititulo" id="itutlo" size="60" placeholder="Informe o título da notícia" required value="<?=$noticia['titulo']?>">
            <br>
            <label for="iresumo">Resumo:</label>
            <br>
            <textarea rows="5" cols="60" name="iresumo" id="iresumo" required placeholder="Faça um breve resumo da notícia"><?=$noticia['resumo']?></textarea>
            <br>
            <label for="ilink">Link:</label>
            <input type="text" name="ilink" id="ilink" size="60" placeholder="link para url da notícia" value="<?=$noticia['link']?>">
            <br>
            <br>
            <button type="submit" class="linkacao">Salvar</button>
            <button type="reset" onclick="window.location.href='../index.php'" class="linkacao">Cancelar</button>
        </form>
    </main>
</body>
</html>