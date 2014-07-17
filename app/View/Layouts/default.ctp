<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi" />
	<title>
		<?php 
		echo '书谱'.$title_for_layout; ?>
	</title>

	<?php echo $this->Html->css('/css/bootstrap.min'); ?>
	<style type="text/css">
			body {
			  padding-top: 70px;
			}
			.jumbotron {
				background: url(/img/white_paperboard.png) repeat 0 0;
		    -moz-box-shadow: 0 5px 3px rgba(32, 32, 32, .08);
		    -webkit-box-shadow: 0 5px 3px rgba(32, 32, 32, .08);
		    box-shadow: 0 5px 5px rgba(32, 32, 32, .28);
			}
			.thumbnail {
				filter:alpha(opacity=80);
				opacity:0.80;
				border: 0;
			}
			img {
			    -moz-box-shadow: 0 3px 3px rgba(32, 32, 32, .08);
			    -webkit-box-shadow: 0 3px 3px rgba(32, 32, 32, .08);
			    box-shadow: 0 3px 3px rgba(32, 32, 32, .28);
			}

			
	</style><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">			
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class=" glyphicon glyphicon-chevron-down"></span>
				</button> 
				<a class="navbar-brand" href="/books">
					<small><span class="glyphicon glyphicon-book"></span> 南七书谱</small>
				</a>
				<a href="/books/add" class="visible-xs navbar-brand" role="button">
					<span class="glyphicon glyphicon-plus"></span>
				</a>
				<a href="/booklists" class="visible-xs navbar-brand" role="button">
					<span class="glyphicon glyphicon-star"></span>
				</a>
				<li class="visible-xs navbar-brand dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="/users"><b>我的</b></a>
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
				</li>				
			</div>
			<div class="navbar-collapse collapse">
				<?php
				echo $this->Form->create('Book',
				array('controller' => 'books', 'action' => 'find', 'class' => 'navbar-form navbar-left', 'role' => 'search'));
				?>
					<div>
					  <div>
					    <div class="input-group">
						      <input  name="data[Book][title]" id="BookTitle" type="text" class="form-control"placeholder="">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						      </span>
						    </form>
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					</div><!-- /.row -->	
				</form>
				<form class="navbar-form navbar-right" role="upload">
					<a href="/books/add" class="hidden-xs btn btn-primary" role="button"><span class="glyphicon glyphicon-plus">传书</span></a>
				</form>
				<ul class="nav navbar-nav navbar-right hidden-xs">
					<li>
						<a href="/booklists">
							<span class="glyphicon glyphicon-star"></span> 书单
						</a>
					</li>
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
					<li>
						<a href="/users/"><span class="glyphicon glyphicon-user"></span> 我的
						</a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<div id="container">
		<div id="row">
			<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
				<?php echo $this->Session->flash('flash', array(
						'element' => 'failure'
						));
				?>
				<?php echo $this->fetch('content'); ?>
				<?php //echo $this->element('sql_dump'); ?>
			</div>
			
		</div>
	</div>
	<div id="footer">
      <div class="container col-xs-12">
        <br><br><br><p class="text-center">
			<small>2014 南七书谱 - ackn. <a href="https://freeshell.ustc.edu.cn">Freeshell</a> 
				| <a href="http://glyphicons.com">glyphicons</a>
				| <a href="http://cakephp.org">cakePHP</a>
				| <a href="/booklists/edit">edit</a></small>
		</p>
      </div>
    </div>

	<?php 
		echo $this->Html->script('/js/jquery-2.0.3.min');
		echo $this->Html->script('/js/holder');
		echo $this->Html->script('/js/mod');
		echo $this->Html->script('/js/bootstrap.min');
		?>

</body>
</html>
