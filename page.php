<?php $this->need('header.php');?>
<div class="article-list">
		<article class="post">
                <header>
                    <h1 class="post-title"><?php $this->title() ?></h1>
                    <div class="post-date"><span><?php dateConvert($this->date->month); ?></span><span><?php $this->date('d'); ?></span></div>
                </header>
                <section class="post-content">
                    <?php $this->content(); ?>

                </section>
                <footer></footer>
            </article>
		<?php $this->need('comments.php'); ?>
	</div>
</div>
<?php $this->need('footer.php'); ?>
