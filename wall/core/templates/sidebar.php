<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Статистика</h4>
        <p>Всего постов: <?php echo R::count('articles'); ?>.</p>
        <p>Дата первого: <?php echo $article->pubdate; ?>.</p>
        <p>Дата последнего: <?php //echo $article->pubdate; ?>.</p>
        <p>Автор первого: <?php echo $article->author; ?></p>
        <p>Автор последнего: <?php //echo $article->author; ?></p>
    </div>
    <!-- /.blog-sidebar -->

</div>
<!-- /.row -->
