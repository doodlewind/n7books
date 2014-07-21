<div class="col-xs-12">
	<h2><a>亲爱的<?php echo $data['User']['username']?>大神 ，<br><small>欢迎光临南七书谱！<small></a></h2>
	<hr>
	<h4><small>不妨完善信息，以便看到更好的书谱</small></h4>
	<h4><small>您还可在<a href="/users/index">这里的 「关注」面板中</a>添加想要的书籍</small></h4>
<?php 
echo $this->Form->create('User', array('controller' => 'users', 'action' => 'guide'));
echo $this->Form->input('user_id', array(
	'type' => 'hidden',
	'value' => $id
));
?>
<div class="col-xs-12">
	<br>
	<div class="btn-group" data-toggle="buttons">
		<select class="form-control" name="data[User][school]" id="UserSchoool">
			<option value="">您的「院系」</option>
			<option value="物院">物院</option>
			<option value="化院">化院</option>
			<option value="少院">少院</option>
			<option value="数院">数院</option>
			<option value="生院">生院</option>
			<option value="信院">信院</option>
			<option value="计院">计院</option>
			<option value="核院">核院</option>
			<option value="工院">工院</option>
			<option value="管院">管院</option>
			<option value="其它">其它</option>
		</select>
	</div>
	<div class="btn-group" data-toggle="buttons">
		<select class="form-control" name="data[User][grade]" id="UserGrade">
			<option value="">您的「身份」</option>
			<option value="大一">大一</option>
			<option value="大二">大二</option>
			<option value="大三">大三</option>
			<option value="大四">大四</option>
			<option value="研究生">研究生</option>
			<option value="博士生">博士生</option>
			<option value="教工">教工</option>
			<option value="其它">其它</option>
		</select>
	</div>
	<?php 
	echo $this->Form->end(
		array(
			'label' => '确定',
			'class' => 'btn btn-success btn-default',
			'div' => false,
	)); 
	?>
	<a role="button" class="btn btn-info" href="/books">先逛逛</a>
</div>
		
		<br>
	</div>
</div>