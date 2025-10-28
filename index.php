<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Notícias 2025</title>
</head>
<body>
    <main>
        <h1 class="titulo">Notícias 2025</h1>
        <br>
        <a class="linkacao" href="novanoticia.php"><img src="img/novo.png"> Nova Notícia</a>
        <br>
        <?php 
        //Carregar conexao com Banco de Dados
        require_once("conexao.php");

        $stmt = $conn->prepare("SELECT * FROM noticia");
        try {
                if ($stmt->execute()) {
                    foreach($stmt as $noticia) {
                        echo "<section>";
                        echo "<article>";
                        echo "<h2>".$noticia['titulo']."</h2>";
                        echo "<p>".$noticia['resumo']."</p>";
                        $dh = strtotime($noticia['datahora']);
                        echo "<span>".date('d/m/Y H:i:s',$dh);
                        echo " - <a href='".$noticia['link']."'>".$noticia['link']."</a></span>";
                        echo "</article>";
                        //botões de ação na notícia
                        echo "<aside>";
                        echo "<span class='opcoes'>";
                        echo "<a class='linkacao' href='alteranoticia.php/?id=".$noticia['id']."'>";
                        echo "<img src='img/editar.png'></a>";
                        echo "<a class='linkacao' href='excluinoticia.php/?id=".$noticia['id']."'>";
                        echo "<img src='img/excluir.png'></a>";
                        echo "</span>";
                        echo "</aside>";
                        echo "</section>";
                    }
                }
        } catch (PDOException $e) {
                echo "Erro ao consulta notícias: ".$e->getMessage();
        }
        ?>
    </main>
</body>
</html>