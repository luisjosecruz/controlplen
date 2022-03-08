<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Plen</title>
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/base.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/login.css';?>">
</head>
<body>
    <main class="login-container">
        <article class="login-box">
            <section class="login-img">
                <div class="login-intro">
                    <h3 class="title">Control Plen</h3>
                    <h3>Es el momento para tomar el control.</h3>
                    <p>Sabemos que el tiempo es lo mas valioso que tenemos, 
                        entonces no lo desperdiciemos buscando múltiples herramientas para organizarnos.
                        En un solo lugar podemos llevar el control de nuestra vida.</p>
                </div>
                <img src="<?=URLSERVER.'/assets/images/login.svg';?>" alt="login">
                <div class="login-intro">
                    <p>Si no tienes una cuenta todavía, <br> puedes registrarte haciendo click <a href="/signup">aquí.</a></p>
                </div>
            </section>
            <section class="login-form">
                <p>Control Plen</p>
                <form id="loginForm">
                    <input type="text" id="username" name="username" placeholder="Usuario" autocomplete="off">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                    <input type="submit" value="Login">
                </form>
            </section>
        </article>
    </main>
    <script src="<?=URLSERVER.'/assets/scripts/utils.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/login.js';?>"></script>
</body>
</html>