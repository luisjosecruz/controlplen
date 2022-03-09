<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Plen | Registro</title>
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/base.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/login.css';?>">
    <link rel="shortcut icon" href="<?=URLSERVER.'/assets/images/logo.png';?>" type="image/png">
</head>
<body>
    <main class="login-container">
        <article class="login-box">
            <section class="login-img">
                <div class="login-intro">
                    <h3 class="title">Control Plen</h3>
                    <h3>Crear una cuenta te puede cambiar la vida.</h3>
                    <p>Este paso es importante para alcanzar tus objetivos.
                        ¿Estás pensando en ser tu mejor versión?
                    </p>
                </div>
                <img src="<?=URLSERVER.'/assets/images/register.svg';?>" alt="login">
                <div class="login-intro">
                    <p>Si ya tienes una cuenta, <br> puedes iniciar sesión haciendo click <a href="/signin">aquí.</a></p>
                </div>
            </section>
            <section class="login-form register">
                <p>Registro</p>
                <form id="registerForm">
                    <input type="text" id="name" name="name" placeholder="Nombre" autocomplete="off">
                    <input type="text" id="lastname" name="lastname" placeholder="Apellido" autocomplete="off">
                    <input type="text" id="email" name="email" placeholder="Correo electrónico" autocomplete="off">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirmar contraseña">
                    <input type="submit" value="Guardar">
                </form>
            </section>
        </article>
    </main>
    <script src="<?=URLSERVER.'/assets/scripts/utils.js';?>"></script>
</body>
</html>

<script>

let registerForm = document.getElementById("registerForm");

registerForm.addEventListener('submit', (e) => {

    console.log("sada");

    e.preventDefault();

    let formData = new FormData(e.target);
    formData.append("ajax", "register");

    if (validateData(formData)) {
        sendAjax('/src/ajax.php', formData);
    }
});

</script>