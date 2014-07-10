<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<div class="row">

  <div class="col-sm-7 col-sm-offset-3">
		<h3><a>欢迎光临南七书摊</a><br><small>登录以继续</small></h3><hr>
	</div>
	
  <div class="col-sm-4 col-sm-offset-3">
		<?php 
			echo $this->Form->input('email',
				array('label' => '邮箱', 'type' => 'email', 'class' => 'form-control', 'placeholder' => ''));
		?>
  </div>
  <div class="col-sm-3">
			<?php 
				echo $this->Form->input('password',
					array('label' => '密码', 'class' => 'form-control', 'placeholder' => ''));
			?>
		<span class="help-block text-right">重置密码</span>
	</div>

	<div class="col-sm-4 col-sm-offset-6">
		<p class="text-right">
		<a class="btn btn-info" href="/i/users/add">注册</a>
		<input class="btn btn-primary" type="submit" value="登录">
		</p>
	</div>

</div>
</form>
<div class="btn-group" data-toggle="buttons">

</div>