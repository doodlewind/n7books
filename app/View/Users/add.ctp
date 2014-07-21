<?php echo $this->Form->create('User'); ?>
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
		<h3><a>欢迎光临南七书谱</a><br><small>一分钟的事情</small></h3><hr>
	</div>
  <div class="col-sm-6 col-sm-offset-3">
	<div>
			<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'controller' => 'users',  'action' => 'edit')); ?>
								
				<label for="UserUsername" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-user"></span> 昵称</p></label>
				<div class="input required col-xs-7">
					<input name="data[User][username]" class="form-control" type="text" id="UserUsername"
					placeholder="中 / 英 / 数字，10 字内" required="required"><br>
				</div>
															
				<label for="UserEmail" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-envelope"></span> 邮箱</p></label>
				<div class="input required col-xs-7">
					<input name="data[User][email]" class="form-control" type="text" id="UserEmail"
					placeholder="科大邮箱 / 其它邮箱" required="required"><br>
				</div>
				
				<label for="UserMobile" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-earphone"></span> 手机</p></label>
				<div class="input required col-xs-7">
					<input name="data[User][mobile]" class="form-control" type="text" id="UserMobile"
					placeholder="让买家找到你" required="required"><br>
				</div><br>
				
				<label for="UserPassword" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-lock"></span> 密码</p></label>
				<div class="input required col-xs-7">
					<input name="data[User][password]" class="form-control" type="password" id="UserPassword"
					placeholder="6-16 位 英文字母 / 数字" required="required"><br>
				</div><br>
				
				<div class="col-xs-12 col-xs-offset-3">	
				
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default active">
							<input type="radio" name="data[Book][category]" value="东区">东区
						</label>
						<label class="btn btn-default ">
							<input type="radio" name="data[Book][category]" value="西区" checked="">西区
						</label>											
					</div><br>
					<?php echo $this->Form->end(
					array('label' => '注册',
						'class' => 'btn btn-primary',
						'before' => '<br>',
						'div' => false
					) );?>
					 &nbsp;&nbsp;<label class="checkbox-inline"><small>
					   <input type="checkbox" id="inlineCheckbox1" value="option1" checked>同意<a>用户协议</a>
					 </label></small>
				</div>
		</div>
	</div>
</div><!--row-->