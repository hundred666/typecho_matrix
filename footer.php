
<!-- 
    row end
 -->

</div>

<!-- 
	container end
 -->
	<!-- 
		footer start
	 -->
	<div id="footer">
		<div class="container row clear">
			<!--修改成自己的相应信息，请保留版权，谢谢！-->
			<p>
				<a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title();?>"><?php $this->options->title() ?>
				</a>
				<?php if ($this->options->beian):?>
					<a href="http://www.miitbeian.gov.cn" target="_blank"><?php $this->options->beian(); ?></a>
				<?php endif; ?>
				<br/>Power by Tyepcho&nbsp;Designed  by <a href="http://txiner.top"title="Hundred Blog"> Hundred</a>
				
			</p>
		</div>
	</div>
	<!-- 
		footer end
	 -->

</div>
<!-- 
	wrap end
 -->

	<label for="sidebar-checkbox" class="sidebar-toggle"></label>
	<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php $this->options->themeUrl('js/html.js');?>"></script>
	<?php $this->footer(); ?>

</body>

</html>