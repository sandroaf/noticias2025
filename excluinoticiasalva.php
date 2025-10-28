<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Exclui Notícia</title>
</head>
<body>
    <?php
        //carrega conexão com banco de dados
        require_once("conexao.php");
        if (isset($_POST['bacao'])) {
            if ($_POST['bacao'] = 'excluir') {
                try {
                    $parametro = ["id" => $_POST['iid']];
                    $stmt = $conn->prepare("DELETE FROM noticia WHERE id = :id");
                    if ($stmt->execute($parametro)) {
                        //redirecionar para listagem de notícias
                        header("Location: index.php");
                    }
                } catch (Exception $e) {
                    echo "ERRO ao excluir nova notícia: ".$e->getMessage();
                }
            }
        }
    ?>
</body>
</html>