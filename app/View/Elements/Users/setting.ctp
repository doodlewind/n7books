<?php
	echo $this->Html->script('/js/edit-form');
	echo $this->Form->create('User', array(
		'class' => 'form-horizontal',
		'controller' => 'users',
		'action' => 'edit'
	)); 
	echo $this->Form->input('id', array(
		'type' => 'hidden',
		'value' => $user['User']['id']
	));
?>
		
		
<label for="UserUsername" class="col-xs-2 control-label"><p class="text-right"><span class="glyphicon glyphicon-user"></span></p></label>
<div class="input required col-xs-9">
	<input name="data[User][username]" class="form-control" type="text" id="UserUsername" value=<?php  echo '"'.$user['User']['username'].'"';?> required="required"><br>
</div>
											
<label for="UserEmail" class="col-xs-2 control-label"><p class="text-right"><span class="glyphicon glyphicon-envelope"></span></p></label>
<div class="input required col-xs-9">
	<input name="data[User][email]" class="form-control" type="text" id="UserEmail" value=<?php  echo '"'.$user['User']['email'].'"';?> required="required"><br>
</div>

<label for="UserMobile" class="col-xs-2 control-label"><p class="text-right"><span class="glyphicon glyphicon-earphone"></span></p></label>
<div class="input required col-xs-9">
	<input name="data[User][mobile]" class="form-control" type="text" id="UserMobile" value=<?php  echo '"'.$user['User']['mobile'].'"';?> required="required"><br>
</div>
<div class="col-xs-6 col-xs-offset-2">	
		<select class="form-control" name="data[User][school]" id="UserSchoool">
		<?php
			$schools = array(
				'',
				'物院',
				'化院',
				'少院',
				'数院',
				'生院',
				'信院',
				'计院',
				'核院',
				'工院',
				'管院',
				'   '
			);
			$select = '';
			foreach ($schools as $school){
				$tmp = '';
				if ($school ==  $user['User']['school']){
					$tmp = 'selected';
				}
				$select.= '<option value="'.$school.'"';
				$select.= $tmp.'>';
				$select.= $school;
				'</option>';
			}
			echo $select;
		?>
		</select>
</div>
<div class="col-xs-6 col-xs-offset-2">
		<br>
		<select class="form-control" name="data[User][grade]" id="UserSchoool">
			<option value="大一">大一</option>
			<option value="大二">大二</option>
			<option value="大三">大三</option>
			<option value="大四">大四</option>
			<option value="研究生">研究生</option>
			<option value="博士生">博士生</option>
			<option value="教工">教工</option>
		</select>
		<?php echo '<input id="userSchool" type="hidden" value="'.$user['User']['grade'].'">'; ?>
</div>
<div class="col-xs-6 col-xs-offset-2">
	<br>
	<select class="form-control" name="data[User][campus]" id="UserSchoool">
		<option value="东区">东区</option>
		<option value="西区">西区</option>
	</select>
	<?php echo '<input id="userCampus" type="hidden" value="'.$user['User']['campus'].'">'; ?>
</div>
<div class="col-xs-6 col-xs-offset-2">
<?php 
	echo $this->Form->end(
	array('label' => '修改信息',
		'class' => 'btn btn-primary',
		'before' => '<br>'
	));
	?>
</div>
<!--修改密码-->
<div class="col-xs-12"><hr></div>	
<?php 
	echo $this->Form->create('User',array(
		'controller' => 'users',
		'action' => 'edit'
	));
?>
<label for="UserPassword" class="col-xs-2 control-label"><p class="text-right"><span class="glyphicon glyphicon-lock"></span></p></label>
<div class="input required col-xs-9">
	<input name="data[User][password]" class="form-control" type="password" id="UserPassword" value="" placeholder="6-16 位英文字母 / 数字"required="required"><br>
</div><br>

<div class="col-xs-12 col-xs-offset-2">
<?php 
		echo $this->Form->input('id', array(
			'type' => 'hidden',
			'value' => $user['User']['id'],
		));
		echo $this->Form->end(
		array('label' => '修改密码', 'class' => 'btn btn-primary') );
		
?>
</div>