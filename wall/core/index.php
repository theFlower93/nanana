<?php
require "includes/db.php";
require "includes/config.php";
?>

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
            <h1 class="blog-title"><?php echo $config['title']?></h1>
            <p class="lead blog-description"><?php echo $config['subtitle']; ?></p>
        </div>
    </div>

    <div class="container">

        <div class="row mb-5">

            <div class="col-sm-8 blog-main">

				<?php if( isset($_SESSION['logged_user']) ) { ?>
	                <form class="mb-5" method="post">
	                    <h3>Написать на стене</h3>
	                    <?php
							if( isset($_POST['doAdd']) ) {
								$errors = [];
								if( trim($_POST['title']) == '' )
									$errors[] = 'Введите заголовок сообщения';
								if( $_POST['text'] == '' )
									$errors[] = 'Сообщение не может быть пустым';

								if( empty($errors) ) {
									$articles = R::dispense('articles');
									$articles->title = $_POST['title'];
									$articles->pubdate = R::isoDateTime();
									$articles->author = $_SESSION['logged_user']->userName;
									$articles->text = $_POST['text'];
									R::store($articles);
								} else
									echo '<span style="color: red;font-weight: bold">' . array_shift($errors) . '</span><hr />';
							}
	                    ?>
	                    <div class="form-group">
	                        <label for="title">Заголовок сообщение</label>
	                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $_POST['title']; ?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="text">Текст сообщения</label>
	                        <textarea id="text" class="form-control" rows="5" name="text"><?php echo $_POST['text']; ?></textarea>
	                    </div>

	                    <button type="submit" class="btn btn-primary" name="doAdd">Написать</button>
	                </form>
            	<?php } ?>

                <?php $articles = R::findAll('articles', " ORDER BY `id` DESC");
                foreach( $articles as $article ) { ?>
	                <div class="blog-post">
	                    <h2 class="blog-post-title"><?php echo $article->title; ?></h2>
	                    <p class="blog-post-meta">Опубликован <?php echo $article->pubdate; ?>. Автор: <?php echo $article->author; ?></p>

	                    <p><?php echo $article->text; ?></p>
	                </div>
	                <!-- /.blog-post -->
            	<?php } ?>
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