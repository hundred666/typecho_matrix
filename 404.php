<?php $this->need('header.php'); ?>
<div class="article-list">
		<script language="javascript" type="text/javascript">var i=5,intervalid,Url="<?php $this->options->siteUrl(); ?>";intervalid=setInterval("fun()",1000);function fun(){if(i==0){window.location.href = Url;clearInterval(intervalid)}document.getElementById("mes").innerHTML=i;i--}</script>  
		<div style="margin:0 auto">
			<div id="404" style="color:#bbb"><p style="font-size:96px;padding:50px 0 20px 0px;font-family:'Microsoft YaHei' ">404</p></div>
			<p style="padding:50px 0 20px 0px">页面出错或者没有此页面，将会在 <span id="mes" style="color:#3582c1;">5</span> 秒钟后返回首页！</p>
			<p>你也可以试着通过搜索找到你想要看到的文章！</p>
		</div>
</div>
<?php $this->need('footer.php'); ?>