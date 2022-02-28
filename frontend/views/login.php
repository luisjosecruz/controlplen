<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control | Login</title>
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/base.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/login.css';?>">
</head>
<body>
    <main class="login-container">
        <article class="login-box">
            <section class="login-img">
                <img src="<?=URLSERVER.'/assets/images/login.svg';?>" alt="login">
            </section>
            <section class="login-form">
                <p>Control</p>
                <form id="loginForm">
                    <input type="text" id="username" name="username" placeholder="Usuario" autocomplete="off">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                    <input type="submit" value="Login">
                </form>
            </section>
        </article>
    </main>
    <script src="<?=URLSERVER.'/assets/scripts/utils.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/handleAjax.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/login.js';?>"></script>
</body>
</html>