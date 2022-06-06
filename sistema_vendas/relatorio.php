<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <section class="container">
        <div>
            <?php
                
                $json = file_get_contents("./produtos.json");
                $produtos = json_decode($json);
                $cookie = $_COOKIE['vendas'] ?? [];
                $getProduto = array_filter(explode(':', $cookie));

                function quadrinhos ($produtos, $getProduto) {
                    $total = new stdClass();
                    $total->cliques = 0;
                    $total->perc = 0;
                    for ($i = 0; $i < count($produtos); $i++) {
                        if ($produtos[$i]->Categoria === 'Revista em quadrinhos') {
                            for ($j = 0; $j < count($getProduto); $j++) {
                                $getId = intval(explode('=', explode(';', $getProduto[$j])[0])[1]);
                                $getClique = intval(explode('=', explode(';', $getProduto[$j])[1])[1]);

                                if ($produtos[$i]->id === $getId) {
                                    $total->cliques += $getClique;
                                }
                            }
                        }
                    }
                    $total->perc = number_format((100 / totalCliques($getProduto)) * $total->cliques, 2, '.', '') . '%';
                    return $total;
                }

                function actionFigures ($produtos, $getProduto) {
                    $total = new stdClass();
                    $total->cliques = 0;
                    $total->perc = 0;
                    for ($i = 0; $i < count($produtos); $i++) {
                        if ($produtos[$i]->Categoria === 'Action Figure') {
                            for ($j = 0; $j < count($getProduto); $j++) {
                                $getId = intval(explode('=', explode(';', $getProduto[$j])[0])[1]);
                                $getClique = intval(explode('=', explode(';', $getProduto[$j])[1])[1]);

                                if ($produtos[$i]->id === $getId) {
                                    $total->cliques += $getClique;
                                }
                            }
                        }
                    }
                    $total->perc = number_format((100 / totalCliques($getProduto)) * $total->cliques, 2, '.', '') . '%';
                    return $total;
                }

                function mangas ($produtos, $getProduto) {
                    $total = new stdClass();
                    $total->cliques = 0;
                    $total->perc = 0;
                    for ($i = 0; $i < count($produtos); $i++) {
                        if ($produtos[$i]->Categoria === 'Mangá') {
                            for ($j = 0; $j < count($getProduto); $j++) {
                                $getId = intval(explode('=', explode(';', $getProduto[$j])[0])[1]);
                                $getClique = intval(explode('=', explode(';', $getProduto[$j])[1])[1]);

                                if ($produtos[$i]->id === $getId) {
                                    $total->cliques += $getClique;
                                }
                            }
                        }
                    }
                    $total->perc = number_format((100 / totalCliques($getProduto)) * $total->cliques, 2, '.', '') . '%';
                    return $total;
                }

                function livros ($produtos, $getProduto) {
                    $total = new stdClass();
                    $total->cliques = 0;
                    $total->perc = 0;
                    for ($i = 0; $i < count($produtos); $i++) {
                        if ($produtos[$i]->Categoria === 'Livros') {
                            for ($j = 0; $j < count($getProduto); $j++) {
                                $getId = intval(explode('=', explode(';', $getProduto[$j])[0])[1]);
                                $getClique = intval(explode('=', explode(';', $getProduto[$j])[1])[1]);

                                if ($produtos[$i]->id === $getId) {
                                    $total->cliques += $getClique;
                                }
                            }
                        }
                    }
                    $total->perc = number_format((100 / totalCliques($getProduto)) * $total->cliques, 2, '.', '') . '%';
                    return $total;
                }

                function totalCliques ($getProduto) {
                    $total = 0;

                    for ($j = 0; $j < count($getProduto); $j++) {
                        $getClique = intval(explode('=', explode(';', $getProduto[$j])[1])[1]);
                        $total += $getClique;
                    }
                    return $total;
                }

                $hqs = quadrinhos($produtos, $getProduto);
                $af = actionFigures($produtos, $getProduto);
                $mhqs = mangas($produtos, $getProduto);
                $books = livros($produtos, $getProduto);
                //var_dump(totalCliques($getProduto));

                echo "<h1>" . "Relatório de acessos" . "</h1>";
                echo "<table border='1'" .
                        "<tr>" . 
                            "<td>" . "Revistas em Quadrinhos" . "</td>".
                            "<td>" . "Action Figures" . "</td>".
                            "<td>" . "Mangás" . "</td>".
                            "<td>" . "Livros" . "</td>".
                        "</tr>" . 
                        "<tr>" . 
                            "<td>" . $hqs->cliques . "</td>".
                            "<td>" . $af->cliques . "</td>".
                            "<td>" . $mhqs->cliques . "</td>".
                            "<td>" . $books->cliques . "</td>".
                        "</tr>" .
                        "<tr>" . 
                            "<td>" . $hqs->perc . "</td>".
                            "<td>" . $af->perc . "</td>".
                            "<td>" . $mhqs->perc . "</td>".
                            "<td>" . $books->perc . "</td>".
                        "</tr>" .
                    "</table>"
                
            ?>
        </div>
    </section>
</body>
