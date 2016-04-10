<!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<?php if($this->is('index')): ?><title><?php $this->options->title(); ?></title><?php else: ?><title><?php $this->archiveTitle('', '', ''); ?>&#160;&#45;&#160;<?php $this->options->title(); ?></title><?php endif; ?>
<link rel="shortcut icon" href="<?php $this->options->siteUrl('favicon.ico'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<?php $this->header(); ?>
</head>
<body class="layout-reverse sidebar-overlay">
<div class="icon-rocket" id="back-to-top"></div>
<?php $this->need('sidebar.php'); ?>

<!-- 
	wrap start
 -->
<div class="wrap">

	<!--
		masthead start
	-->
	<div class="masthead">
		<div class="container">
		  <h3 class="masthead-title">
		    <a href="<?php $this->options->siteUrl(); ?>" title="Home"><?php $this->options->title(); ?></a>
		    <small><?php $this->options->description() ?></small>
		  </h3>
		</div>
	</div>
	<!-- 
		masthead end
	 -->
	<!-- 
		container start
	 -->
	<div class="container content">
		<div class="row clear">