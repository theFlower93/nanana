<div class="blog-masthead">
    <div class="container">
        <nav class="nav">
            <a class="nav-link active" href="../core/index.php">Стена</a>
            <?php if( !isset($_SESSION['logged_user']) ) { ?>
            <a class="nav-link" href="../core/reg.php">Зарегистрироваться</a>
            <a class="nav-link" href="../core/login.php">Войти</a>
            <?php } ?>
            <?php if( isset($_SESSION['logged_user']) ) { ?>
                <span class="nav-link ml-auto">@<?php echo $_SESSION['logged_user']->userName ?></span>
                <a class="nav-link" href="../core/logout.php">Выйти</a>
        	<?php } ?>
        </nav>
    </div>
</div>