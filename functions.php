<?php

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    //社交链接
    $socialweibo = new Typecho_Widget_Helper_Form_Element_Text('socialweibo', NULL, NULL, _t('输入微博链接'), _t('在这里输入微博链接,带http://'));
    $form->addInput($socialweibo);
    $socialzhihu = new Typecho_Widget_Helper_Form_Element_Text('socialzhihu', NULL, NULL, _t('输入知乎链接'), _t('在这里输入知乎链接,带http://'));
    $form->addInput($socialzhihu);
    $socialgithub = new Typecho_Widget_Helper_Form_Element_Text('socialgithub', NULL, NULL, _t('输入GitHub链接'), _t('输入GitHub链接,带http://'));
    $form->addInput($socialgithub);

    $cnzzinfo = new Typecho_Widget_Helper_Form_Element_Text('cnzzinfo', NULL, NULL, _t('输入统计代码'), _t('在这里输入统计代码'));
    $form->addInput($cnzzinfo);

    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('输入备案号'), _t('输入备案号'));
    $form->addInput($beian);
    
}

/**
 * 转换中文月份 by ShingChi
 */ 
function dateConvert($month) {
    $month = ltrim($month, 0);
    $monthChar = array(1 => '一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二');
    echo $monthChar[$month];
}
 
/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = NULL){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
    ->where('table.contents.created < ?', $widget->created)
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_DESC)
    ->limit(1);
    $content = $db->fetchRow($sql);
     
    if ($content) {
        $content = $widget->filter($content);
        $link = '<a href="' . $content['permalink'] . '"  title="' . $content['title'] . '"><i class="icon icon-left"></i>PREVIOUS</a>';
        echo $link;
    } else {
        echo $default;
    }
}

function theNext($widget, $default = NULL){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
    ->where('table.contents.created > ?', $widget->created)
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_ASC)
    ->limit(1);
    $content = $db->fetchRow($sql);

    if ($content) {
        $content = $widget->filter($content);
        $link = '<a href="' . $content['permalink'] . '"  title="' . $content['title'] . '">
                            <i class="icon icon-right"></i>NEXT</a>';
        echo $link;
    } else {
        echo $default;
    }
}


/**
* 浏览器及操作系统判断
*
* @param string $agent 系统数据库中访者数据
*/
 
/** 获取浏览器信息 */
function getBrowser($agent){
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $outputer = 'Internet Explorer' . ' ' . $regs[1];
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Mozilla FireFox' . ' ' . $regs[1];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Maxthon' . ' ' . $regs[2];
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Google Chrome' . ' ' . $regs[2];
    } else if (preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
        $regg = explode("/",$regs[1]);
        $outputer = 'QQ浏览器' . ' ' . $regg[0];
    } else if (preg_match('/UC/i', $agent)) {
        $outputer = 'UCWeb' . ' ' . '8.11112510';
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Apple Safari' . ' ' . $regs[1];
    } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Opera' . ' ' . $regs[1];
    } else {
        $outputer = '其它浏览器';
    }
 
    echo $outputer;
}
 
/** 获取操作系统信息 */
function getOs($agent){
    $os = false;
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $os = 'Windows Vista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $os = 'Windows 7';
        } else if (preg_match('/nt 5.1/i', $agent)) {
            $os = 'Windows XP';
        } else if (preg_match('/nt 5/i', $agent)) {
            $os = 'Windows 2000';
        } else {
            $os = 'Windows';
        }
    } else if (preg_match('/android/i', $agent)) {
        $os = 'Android';
    } else if (preg_match('/ubuntu/i', $agent)) {
        $os = 'Ubuntu';
    } else if (preg_match('/linux/i', $agent)) {
        $os = 'Linux';
    } else if (preg_match('/mac/i', $agent)) {
        $os = 'Mac OS X';
    } else if (preg_match('/unix/i', $agent)) {
        $os = 'Unix';
    } else if (preg_match('/symbian/i', $agent)) {
        $os = 'Nokia SymbianOS';
    } else {
        $os = '其它操作系统';
    }
 
    echo $os;
}
/*
系统自带评论
*/	
function threadedComments($comments,$singleCommentOptions) {
		$imgUrl = Helper::options()->siteUrl . 'usr/themes/Vincent/images/pingback.jpg';
        $author = '<a href="'.$comments->url.'" rel="external nofollow" target="_blank">'.$comments->author.'</a>';
		$depth = $comments->levels +1;
		if($depth<=1){
			$size = (int) Helper::options()->commentsPageSize;
			$curr = (int) $comments->current();
			$cn   = (int) $comments->sequence;
			$n = $cn + ( $curr -1 )*$size;
			$floor = $n.'楼'; // 主楼层
		}else{
			$floor = ($depth-1).'#';  // 子楼层
			$style = 'style="margin-left:' . ceil(80/2) . 'px;"';
		}
    ?>
<li id="<?php $comments->theId(); ?>" <?php if( $depth == 2) echo $style;?>>
	<div id="comment-<?php $comments->theId(); ?>">
        <div  class="comment-body <?php echo 'depth-'.$depth;?>">
		    <div class="commentmeta <?php echo 'commentmeta-'.$depth;?>"><?php if($comments->type == 'pingback'){ echo '<img src="'.$imgUrl.'" width="40" height="40" />';}else{$comments->gravatar('40','');}?></div>
			<div class="commentmetadata"><span class="c-floor"><?php echo $floor; ?></span></div>
		
			<div class="vcard"><?php echo $author; ?>
				
			<span class="c-time"><?php $comments->date('Y-m-d') ?></span><span class="c-at"><?php $comments->reply('回复TA') ?></span>

			</div>

			<div class="broswer"><?php getBrowser($comments->agent); ?> @ <?php getOs($comments->agent); ?></div>

			<?php $comments->content(); ?>
        </div>
        <div class="children">
            <?php if ($comments->children) { ?><?php $comments->threadedComments($singleCommentOptions); ?><?php } ?>
        </div>
	</div>
</li>
<?php } ?>