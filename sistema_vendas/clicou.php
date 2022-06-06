<?php

$id = $_GET['id'];

$stringArray = $_COOKIE['vendas'] ?? '';

if ($stringArray === '') {
    $quantidade_de_cliques = 1;
    $stringProduto = 'id=' . $id . ';' . 'cliques=' . $quantidade_de_cliques . ":";
    setcookie('vendas', $stringArray.$stringProduto, time() + 60 * 60 * 24, '/');
    //var_dump($_COOKIE['vendas']);
} else {
    $explodeCookie = array_filter(explode(":", $stringArray));

    for ($i = 0; $i < count($explodeCookie); $i++) {
        $explodeId = explode('=', explode(';', $explodeCookie[$i])[0])[1];
        $explodeClique = explode('=', explode(';', $explodeCookie[$i])[1])[1];
        if ($id === $explodeId) {
            $explodeClique++;
            $newStringProduto = 'id=' . $id . ';' . 'cliques=' . $explodeClique;
            $update = str_replace($explodeCookie[$i], $newStringProduto, $_COOKIE['vendas']);
            setcookie('vendas', $update, time() + 60 * 60 * 24, '/');
            var_dump($_COOKIE['vendas']);
        } else {
            if ($i === count($explodeCookie) - 1) {
                $quantidade_de_cliques = 1;
                $stringProduto = 'id=' . $id . ';' . 'cliques=' . $quantidade_de_cliques . ":";
                setcookie('vendas', $stringArray.$stringProduto, time() + 60 * 60 * 24, '/');
                var_dump($_COOKIE['vendas']);
             } 
        } 
    }
}

// setcookie($id, $quantidade_de_cliques + 1, time() + 60 * 60 * 24, '/');
header('Location: homepage.php');