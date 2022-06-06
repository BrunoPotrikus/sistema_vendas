<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promoção</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <section>
        <div>
            <?php

            $id = $_GET['id'];
            $json = file_get_contents("./produtos.json");
            $produtos = json_decode($json);
            
            for ($i = 0; $i < count($produtos); $i++) {
                if ($produtos[$i]->id === $id) {
                    echo "<li class='produto'>" .
                                "<a href='clicou.php?id={$produtos[$i]->id}'> <img src='./assets/img/{$produtos[$i]->Imagem}'></a>" .
                                "<p>" . $produtos[$i]->Nome . "</p>" .
                                "<p>" . "Categoria: " . $produtos[$i]->Categoria . "</p>" .
                                "<p>" . "Preço: R$" . $produtos[$i]->Preco . ",00" . "</p>"
                                . "</li>";
                }
            }
            
            ?>
        </div>
    </section>
</body>
</html>