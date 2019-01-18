<?php require "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/app.css" />
</head>

<body>

    <?php include "templates/header.php"; ?>

    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">Авторизация</h1>
            <p class="lead blog-description">С возвращением в большое сообщество имени великой стены</p>
        </div>
    </div>

    <div class="container">

        <div class="row mb-5">

            <div class="col-sm-8 blog-main">

                <form method="post">
                    <?php
                        if( isset($_POST['doLogin']) ) {
                            $errors = [];   // массив для ошибок
                            $user = R::findOne('users', 'email = ?', [$_POST['email']]);

                            if( $user ) {
                                // если пользователь существует
                                if( password_verify($_POST['password'], $user->password) ) {
                                    // всё ок, логинимся
                                    $_SESSION['logged_user'] = $user;
                                    echo '<div style="color: #428BCA;">Вход выполнен.<br />Здравствуйте, ' . $_SESSION['logged_user']->userName . '!</div><hr />';
                                } else
                                    $errors[] = 'Пароль введён не верно!';
                            } else
                                $errors[] = 'Вход в систему с указанными данными невозможен.';

                            // Проверка на ошибки
                            if( !empty($errors) )
                                echo '<span style="color: red;font-weight: bold">' . array_shift($errors) . '</span><hr />';
                        }
                    ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo @$_POST['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Запомнить меня
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="doLogin">Войти</button>
                </form>

            </div>
            <!-- /.blog-main -->

            <?php include "templates/sidebar.php"; ?>

        </div>
        <!-- /.container -->

        <?php include "templates/footer.php"; ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>