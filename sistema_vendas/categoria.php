<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categoria</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <section class="container">
        <ul>
            <?php

            $json = file_get_contents("./produtos.json");
            $produtos = json_decode($json);

            $categoria = $_GET['categoria'];

            echo "<h1>" . "{$categoria}" . "</h1>";

            for ($i = 0; $i < count($produtos); $i++) {
                if ($produtos[$i]->Categoria === $categoria) {
                    echo "<li class='produto'>" .
                                "<a href='clicou.php?id={$produtos[$i]->id}'> <img src='./assets/img/{$produtos[$i]->Imagem}'></a>" .
                                "<p>" . $produtos[$i]->Nome . "</p>" .
                                "<p>" . "Categoria: " . $produtos[$i]->Categoria . "</p>" .
                                "<p>" . "Preço: R$" . $produtos[$i]->Preco . ",00" . "</p>"
                                . "</li>";
                }
            }

            ?>
        </ul>
    </section>
</body>

</html>