<div class="col-sm-7 col-sm-offset-2">
	<h3><a>密码重置</a></h3>
	<hr>
	<?php echo $this->Form->create('User',array(
		'class' => 'form-horizontal',
		'role' => 'form'
	)); ?>
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="data[User][email]"class="form-control" id="UserEmail" placeholder="">
	    </div>
	  </div>
	<?php echo $this->Form->end(
	array('label' => '确认',
		'class' => 'btn btn-primary',
		'div' => false
	));
	?>
  </form>
</div>