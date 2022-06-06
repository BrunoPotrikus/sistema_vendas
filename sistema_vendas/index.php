<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <section class="container">
        <h1>Login</h1>
        <div>
            <ul>
                <li><input type="text" placeholder="E-mail" class="email"></li>
                <li><input type="password" placeholder="Senha" class="senha"></li>
            </ul>
            <ul>
                <input type="button" class="btn-login" value="Login">
                <li><button class="btn-criar-conta">Criar conta</button>
                </li>
            </ul>
        </div>
    </section>
    <?php include("./assets/php/cookies.php") ?>
    <script src="./assets/js/main.js" type="module"></script>
</body>
</html>