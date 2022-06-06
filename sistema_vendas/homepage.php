<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <button><a href="./assets/php/destroy.php">Logout</a></button>
    </header>
    <section class="container">
        <div>
            <h1>Promoção</h1>
            <?php

                $json = file_get_contents("./produtos.json");
                $produtos = json_decode($json);

                $cookie = $_COOKIE['vendas'] ?? [];
                $maisClicado = 0;
                $id = 0;

                if (!empty($cookie)) {
                    $getProduto = array_filter(explode(':', $cookie));

                    for ($i = 0; $i < count($getProduto); $i++) {
                        $getId = intval(explode('=', explode(';', $getProduto[$i])[0])[1]);
                        $getClique = intval(explode('=', explode(';', $getProduto[$i])[1])[1]);

                        if ($getClique > $maisClicado) {
                            $maisClicado = $getClique;
                            $id = $getId;
                        }
                    }
                    
                    for ($i = 0; $i < count($produtos); $i++) {
                        if ($produtos[$i]->id === $id) {
                            echo "<a href='promocao.php?id=$id'><img src='./assets/img/{$produtos[$i]->Imagem}'></a>";
                        }      
                    }
                }
                      
            ?>
        </div>
        <div>
            <h1>Categorias</h1>
            <ul>
                <li>
                    <a href="categoria.php?categoria=Revista em quadrinhos">Resvistas em quadrinhos</a>
                </li>
                <li>
                    <a href="categoria.php?categoria=Action Figure">Action figures</a>
                </li>
                <li>
                    <a href="categoria.php?categoria=Mangá">Mangás</a>
                </li>
                <li>
                    <a href="categoria.php?categoria=Livros">Livros</a>
                </li>
            </ul>
        </div>
    </section>
</body>

</html>