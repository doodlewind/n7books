<?php echo $this->Form->create('Booklist'); ?>
<div class="col-xs-3 col-sm-2 col-sm-offset-2">
	<select name="data[Booklist][grade]" class="form-control">
	  <option value="">年级</option>
	  <option value="大一">大一</option>
	  <option value="大二">大二</option>
	  <option value="大三">大三</option>
	  <option value="大四">大四</option>
	</select>
</div>
<div class="col-xs-3 col-sm-2">
	<select name="data[Booklist][school]" class="form-control">
	  <option value="">院系</option>
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
	</select>
</div>
<div class="col-xs-3 col-sm-2">
	<select name="data[Booklist][semester]" class="form-control">
	  <option value="">学期</option>
	  <option value="春季学期">春季学期</option>
	  <option value="秋季学期">秋季学期</option>
	</select>
</div>
<div class="col-xs-3 col-sm-2">
	<?php echo $this->Form->end(
		array('label' => '查看', 'class' => 'btn btn-default'
	)); ?>
</div>
<br><br><br>