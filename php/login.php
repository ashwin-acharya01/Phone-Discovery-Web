<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/561064de78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Sign In/Sign up</title>
</head>
<body>
    <main>
        <div class="container">
            <section class="formSection">
                <div class="signin-signup">
                <form action="" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="password">
                    </div>
                    <input type="submit" value="Login" class="submit-btn">
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </form>

                <form action="" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="password">
                    </div>
                    <input type="submit" value="Sign up" class="submit-btn">
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </form>
                </div>
            </section>

            <section class="panel-container">
                <article class="panel left-panel">
                    <div class="content">
                        <h3>new here ?</h3>
                        <p>we help people buy the best smartphones at the best price</p>
                        <button class="btn transparent" id="sign-up-btn">Sign up</button>
                    </div>
                    <img src="../images/signup.svg" class="image" alt="signup-illustration">
                </article>

                <article class="panel right-panel">
                    <div class="content">
                        <h3>Already been here ?</h3>
                        <p>Wow!! we're glad you are back! lets take you to login page</p>
                        <button class="btn transparent" id="sign-in-btn">Sign in</button>
                    </div>
                    <img src="../images/signin.svg" class="image" alt="signin-illustration">
                </article>
            </section>
        </div>
    </main>
    <script src="../js/login.js"></script>
</body>
</html>