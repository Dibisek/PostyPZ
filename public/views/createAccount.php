<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script type="text/javascript" src="./public/js/validator.js" defer></script>

    
    <title>Login</title>

</head>

<body id="login">
    <div class="base-container-login">
        <img src="/img/logo.svg" alt="logo alt">
        <div class="login-container">
            <h1 class="hlabel">Create account</h1>
            <form action="createaccount" method="POST">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </span>
                <label for="username" class="llabel">Username</label>
                <input name="username" type="text" placeholder="Username" class="input-text">
                <label for="email" class="llabel">Email</label>
                <input name="email" type="email" placeholder="Email" class="input-text">
                <label for="password" class="llabel">Password</label>
                <input name="password" type="password" placeholder="Password" class="input-text">
                <label for="conf_password" class="llabel">Repeat password</label>
                <input name="conf_password" type="password" placeholder="Repeat password" class="input-text">
                <button type="submit" class="input-text">Confirm</button>
                <a href="login">Have an account? <span>Login</span></a>

            </form>

        </div>
    </div>
</body>

</html>