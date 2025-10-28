<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Nova notícia</title>
</head>
<body>
    <main>
        <h1 class="titulo">Nova Notícia</h1>
        <br>
        <form action="novanoticiasalva.php" method="POST">
            <label for="ititulo">Título:</label>
            <input type="text" name="ititulo" id="itutlo" size=60 placeholder="Informe o título da notícia" required>
            <br>
            <label for="iresumo">Resumo:</label>
            <br>
            <textarea rows=5 cols=60 name="iresumo" id="iresumo" required placeholder="Faça um breve resumo da notícia"></textarea>
            <br>
            <label for="ilink">Link:</label>
            <input type="text" name="ilink" id="ilink" size=60 placeholder="link para url da notícia" value="http://">
            <br>
            <br>
            <button type="submit" class="linkacao">Salvar</button>
            <button type="reset" onclick="window.location.href='index.php'" class="linkacao">Cancelar</button>
        </form>
    </main>
</body>
</html>