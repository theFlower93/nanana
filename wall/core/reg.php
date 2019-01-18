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
            <h1 class="blog-title">Регистрация</h1>
            <p class="lead blog-description">Присоединяйтесь к большому сообществу</p>
        </div>
    </div>

    <div class="container">

        <div class="row mb-5">

            <div class="col-sm-8 blog-main">

                <form method="post">
                    <?php
                        if( isset($_POST['doReg']) ) {
                            $errors = [];   // массив для ошибок
                            if( trim($_POST['email']) == '' )
                                $errors[] = 'Введите Email!';
                            if( trim($_POST['userName']) == '' )
                                $errors[] = 'Введите Имя пользователя!';
                            if( $_POST['password'] == '' )
                                $errors[] = 'Введите пароль!';
                            if( $_POST['confirmPassword'] != $_POST['password'] )
                                $errors[] = 'Повторный пароль введён не верно!';

                            // Занят ли Email
                            if( R::count('users', "email = ?", [$_POST['email']]) > 0 )
                                $errors[] = 'Пользователь с таким Email уже существует!';

                            // Занято ли Имя пользователя
                            if( R::count('users', "userName = ?", [$_POST['userName']]) > 0 )
                                $errors[] = 'Пользователь с таким Именем уже существует!';

                            // Проверка на ошибки
                            if( empty($errors) ) {
                                $user = R::dispense('users');
                                $user->email = $_POST['email'];
                                $user->userName = $_POST['userName'];
                                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                R::store($user);
                                header("Location: reg_success.php");
                            } else
                                echo '<span style="color: red;font-weight: bold">' . array_shift($errors) . '</span><hr />';
                        }
                    ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo @$_POST['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Имя пользователя</label>
                        <input type="text" class="form-control" id="username" placeholder="Имя пользователя" name="userName" value="<?php echo @$_POST['userName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Повторите пароль</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="confirmPassword">
                    </div>

                    <button type="submit" class="btn btn-primary" name="doReg">Зарегистрироваться</button>
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