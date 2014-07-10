<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi" />
	<title>
		<?php 
		echo '书摊'.$title_for_layout; ?>
	</title>

	<?php echo $this->Html->css('/css/bootstrap.min'); ?>
	<style type="text/css">
			body {
			  padding-top: 70px;
			}
	</style><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>
	</div><!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">			
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class=" glyphicon glyphicon-chevron-down"></span>
				</button> 
				<a class="navbar-brand" href="/books">
					<span class="glyphicon glyphicon-book"></span> 南七书摊
				</a>
				<a href="/books/add" class="visible-xs navbar-brand" role="button">
					<span class="glyphicon glyphicon-plus"></span>
				</a>
				<a href="/users" class="visible-xs navbar-brand" role="button">
					<span class="glyphicon glyphicon-user"></span>
				</a>
				<li class="visible-xs navbar-brand dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="/books/category/数理">数理</a>
						</li>
						<li>
							<a href="/books/category/生化">生化</a>
						</li>
						<li>
							<a href="/books/category/信息">信息</a>
						</li>
						<li>
							<a href="/books/category/工程">工程</a>
						</li>
						<li>
							<a href="/books/category/外语">外语</a>
						</li>
						<li>
							<a href="/books/category/社科">社科</a>
						</li>
						<li>
							<a href="/books/category/其它">其它</a>
						</li>
					</ul>
				</li>				
			</div>
			<div class="navbar-collapse collapse">
				<form class="navbar-form navbar-left" role="search">
					<div>
					  <div>
					    <div class="input-group">
					      <input type="text" class="form-control"placeholder="..">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
					      </span>
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					</div><!-- /.row -->	
				</form>
				<form class="navbar-form navbar-right" role="upload">
					<a href="/books/add" class="hidden-xs btn btn-primary" role="button"><span class="glyphicon glyphicon-plus">传书</span></a>
				</form>
				<ul class="nav navbar-nav navbar-right hidden-xs">
					<li class="dropdown hidden-xs">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> 分类 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="/books/category/数理">数理</a>
							</li>
							<li>
								<a href="/books/category/生化">生化</a>
							</li>
							<li>
								<a href="/books/category/信息">信息</a>
							</li>
							<li>
								<a href="/books/category/工程">工程</a>
							</li>
							<li>
								<a href="/books/category/外语">外语</a>
							</li>
							<li>
								<a href="/books/category/社科">社科</a>
							</li>
							<li>
								<a href="/books/category/其它">其它</a>
							</li>
						</ul>
					</li>
					<li >
						<a href="/users/"><span class="glyphicon glyphicon-user"></span> 我的</a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<div id="container">
		<div id="row">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<?php echo $this->Session->flash('flash', array(
						'element' => 'failure'
						));
				?>
				<?php echo $this->fetch('content'); ?>
				<?php //echo $this->element('sql_dump'); ?>
			</div>
			<div class="col-md-3  hidden-sm hidden-xs">
				<span class="hidden-xs">
				<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
					<li>
						<a href="/books">全部</a>
					</li>
					<li>
						<a href="/books/category/数理">数理</a>
					</li>
					<li>
						<a href="/books/category/生化">生化</a>
					</li>
					<li>
						<a href="/books/category/信息">信息</a>
					</li>
					<li>
						<a href="/books/category/工程">工程</a>
					</li>
					<li>
						<a href="/books/category/外语">外语</a>
					</li>
					<li>
						<a href="/books/category/社科">社科</a>
					</li>
					<li>
						<a href="/books/category/其它">其它</a>
					</li>
				</ul>
			</span>
			</div>
		</div>
</div>
	<?php 
		echo $this->Html->script('/js/jquery-2.0.3.min');
		echo $this->Html->script('/js/holder');
		echo $this->Html->script('/js/bootstrap.min');
		?>

</body>
</html>
