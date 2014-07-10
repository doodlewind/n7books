<?php echo $this->Form->create('User'); ?>
<div class="row">

  <div class="col-sm-5 col-sm-offset-4">
		<h3><a>欢迎光临南七书摊</a><br><small>30秒完成注册</small></h3><hr>
	</div>
	
  <div class="col-sm-5 col-sm-offset-4">
		<?php 
			echo $this->Form->input('username',
				array('label' => '昵称', 'class' => 'form-control', 'placeholder' => '中/英文，10字内'));
			echo '<br>';
			echo $this->Form->input('email',
					array('label' => '邮箱', 'class' => 'form-control', 'placeholder' => '用于登陆 / 找回密码'));
			echo '<br>';
			echo $this->Form->input('password',
					array('label' => '密码', 'class' => 'form-control', 'placeholder' => '6-16位英文字母/数字'));
		?>
		<span class="help-block text-right">重置密码</span>
  </div>

	<div class="col-xs-6 col-sm-3 col-xs-offset-3 col-sm-offset-5">
		<input class="btn btn-primary btn-block" type="submit" value="注册">
	</div>
		
	</div>


	

</div>