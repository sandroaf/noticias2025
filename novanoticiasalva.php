<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Nova Notícia Salva</title>
</head>
<body>
    <?php
        //carrega conexão com banco de dados
        require_once("conexao.php");
        try {
            $parametros = ["titulo" => $_POST['ititulo']
                         ,"resumo" => $_POST['iresumo']
                         ,"link" => $_POST['ilink']];
            $stmt = $conn->prepare("INSERT INTO noticia (titulo,resumo,link) VALUE (:titulo,:resumo,:link)");
            if ($stmt->execute($parametros)) {
                //redirecionar para listagem de notícias
                header("Location: index.php");
            }
        } catch (Exception $e) {
            echo "ERRO ao salvar nova notícia: ".$e->getMessage();
        }
    ?>
</body>
</html>