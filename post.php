<?php $this->need('header.php');?>
<div class="article-list">
	<div id="breadcrumb">
		<a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title();?>">首页</a><span>&#187;</span><?php $this->category(','); ?><span>&#187;</span><?php $this->title() ?>
	</div>
					
				
	<article class="post">
        <header>
            <h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
            
            <div class="post-date"><span><?php dateConvert($this->date->month); ?></span><span><?php $this->date('d'); ?></span></div>
        </header>
        <section class="post-content">
            <?php $this->content('Read More &raquo;'); ?>

        </section>
        <footer></footer>
        <div class="post-tags"><?php $this->tags(' ', true, ''); ?></div>
    </article>

	<div class="index-pagenav cf">
	    <div class="page-nav">
	        <div class="page-prev left" title="<?php _e('上一篇');?>"><?php thePrev($this); ?></div>
	        <div class="page-next right" title="<?php _e('下一篇');?>"><?php theNext($this); ?></div>
	    </div>
	</div>


	<div class="clear"></div>
	<div class="left"><div class="comments_number">目前有<?php $this->commentsNum(_t('0'), _t('1'), _t(' %d ')); ?>条评论</div><a href="#comment_form" title="Go-to-respond" rel="nofollow"><div class="comment_report" ></div></a></div>
	<div class="commentsorping"><div class="commentpart">Comments</div></div>
	<div class="clear"></div>
	<div class="reporthr"></div>
	<?php $this->need('comments.php'); ?>
	</div>
</div>
<?php $this->need('footer.php'); ?>
