<input type="checkbox" class="sidebar-checkbox" id="sidebar-checkbox" checked="">
<!-- Toggleable sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-item">
            <p><?php $this->options->description() ?></p>
        </div>
        
        <nav class="sidebar-nav">
            <a class="sidebar-nav-item <?php if($this->is('index')): ?> active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>">主页</a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <a class="sidebar-nav-item <?php if($this->is('page', $pages->slug)): ?> active<?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                <?php endwhile; ?>
        </nav>

        <div class="sidebar-item-other">
            <p class="category">
                分类
            </p>
        </div>


        <nav class="sidebar-nav">
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while($category->next()): ?>
                <a class="sidebar-nav-item <?php if($this->is('category', $category->slug)): ?> active<?php endif; ?>" href="<?php $category->permalink(); ?>" title="<?php $category->title(); ?>"><?php $category->name(); ?></a>
                <?php endwhile; ?>

        </nav>

        
        <div class="sidebar-item-other">
            <p class="sns">
                社交连接
            </p>
        </div>
        <nav class="sidebar-nav">
            <?php if ($this->options->socialweibo): ?>
                <a class="sidebar-nav-item" href="<?php $this->options->socialweibo(); ?>" title="Weibo" target="_blank">微博</a>
            <?php endif; ?>
            <?php if ($this->options->socialzhihu): ?>
                <a class="sidebar-nav-item" href="<?php $this->options->socialzhihu(); ?>" title="Zhihu" target="_blank">知乎</a>
            <?php endif; ?>
            <?php if ($this->options->socialgithub): ?>
                <a class="sidebar-nav-item" href="<?php $this->options->socialgithub(); ?>" title="Github" target="_blank">Github</a>
            <?php endif; ?>
        </nav>
        
        
        <div class="sidebar-item-other">
            <p class="copyright">
                &copy; <?php echo date('Y'); ?>. All rights reserved.
                <?php if ($this->options->cnzzinfo):?>
                    <?php $this->options->cnzzinfo(); ?>
                <?php endif; ?>
            </p>
        </div>
    </div>