<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once __DIR__ . '/shared/head.php' ?>
    
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    
    <title>Login</title>

</head>

<body id="login">
    <div class="base-container-login">
        <img src="/img/logo.svg" alt="logo alt">
        <div class="login-container">
            <h1 class="hlabel">Sign in</h1>
            <form action="login" method="POST">
                <span class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>

                </span>
                <label for="email" class="llabel">Email</label>
                <input name="email" type="text" placeholder="email" class="input-text">
                <label for="password" class="llabel">Password</label>
                <input name="password" type="password" placeholder="password" class="input-text">
                <button type="submit" class="input-text">Login</button>
                <a href="createaccount"> Don't have an account? <span>Create account</span></a>

            </form>

        </div>
    </div>
</body>

</html>