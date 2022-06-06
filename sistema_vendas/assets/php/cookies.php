<?php

if (isset($_GET["useremail"])) {
    $userEmail = $_GET["useremail"];
    setcookie("vendas_cookie", $userEmail, time() + (3600 * 24), "/");
} else {
    return "<p>" . "Empty" . "</p>";
}

?>