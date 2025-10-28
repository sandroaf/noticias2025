<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo.css">
    <title>Exclui Notícia</title>
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
        <h1 class="titulo">Exclui Notícia</h1>
        <br>
        <section>
            <article>
                <h2><?=$noticia['titulo']?></h2>
                <p><?=$noticia['resumo']?></p>
                <?php $dh = strtotime($noticia['datahora']); ?>
                <span><?=date('d/m/Y H:i:s',$dh)?> - 
                <a href='<?=$noticia['link']?>'><?=$noticia['link']?></a>
                <br><br>
                <form action="../excluinoticiasalva.php" method="POST">
                    <input id="iid" name="iid" type="hidden" value="<?=$noticia['id']?>">
                    <button type="submit" value="excluir" name="bacao" class="linkacao">Confirmar</button>
                    <button type="reset" onclick="window.location.href='../index.php'" class="linkacao">Cancelar</button>
                </form>
            </article>
    </main>
</body>
</html>