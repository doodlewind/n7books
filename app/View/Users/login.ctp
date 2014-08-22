<?php echo $this->Session->flash('auth'); ?>
<?php 
	echo $this->Form->create('User', array(
		'name'=>'login'
	)); 
?>
<div class="col-xs-12">
		<h3><a>欢迎光临南七书谱</a><br><small>登入或<b> <a href="/users/add">注册</a> </b>以继续</small></h3><hr>
	</div>
	
  <div class="col-sm-4 col-sm-offset-2">
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
		<span class="help-block text-right"><a href="/users/reset">忘记密码</a></span>
	</div>
	<div class="col-sm-4 col-sm-offset-5">
		<p class="text-right">
		<a class="btn btn-info" href="/users/add">注册</a>
		<input class="btn btn-primary" type="submit" value="登入">
		</p>
	</div>

</div>
</form>