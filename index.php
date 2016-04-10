<?php
/**
 * 自己综合各个博客组合出来的
 * 
 * @package Matrix
 * @author Hundred	
 * @version 1.0.0
 * @link http://txiner.top
 */
$this->need('header.php');?>
<!-- 
    article list start
 -->
<div class="article-list">
	<?php while($this->next()):?>
		<article class="post">
            <header>
                <h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                <div class="post-date"><span><?php dateConvert($this->date->month); ?></span><span><?php $this->date('d'); ?></span></div>
            </header>
            <section class="post-content">
                <?php $this->content('Read More &raquo;'); ?>
            </section>
			<p class="post-info"><?php $this->category(' / '); ?> Posted by <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a><span class="comments"> / <a href="<?php $this->permalink(); ?>#comments"><?php $this->commentsNum('0', '1', '%d'); ?></a> comments</span>
			</p>
            <footer></footer>
        </article>
	<?php endwhile; ?>
	<div class="index-pagenav cf">
        <div class="page-nav">
            <div class="page-prev left" title="<?php _e('上一页');?>"><?php $this->pageLink('<i class="icon icon-left"></i> Previous','prev');?></div>
            <span class="page-number">Page <?php echo $this->_currentPage; ?></span>
            <div class="page-next right" title="<?php _e('下一页');?>"><?php $this->pageLink('<i class="icon icon-right"></i>Next ','next');?></div>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>