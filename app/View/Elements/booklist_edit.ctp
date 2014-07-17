<?php echo $this->Form->create('Booklist'); ?>
<div class="col-xs-12"><h3><a>添加</a></h3></div>
<div class="col-xs-4">
	<input type="text" class="form-control" name="data[Booklist][title]" placeholder="书名">
</div>
<div class="col-xs-3">
	<input type="text" class="form-control" name="data[Booklist][author]" placeholder="作者">
</div>
<div class="col-xs-2">
	<input type="text" class="form-control" name="data[Booklist][type]" placeholder="类型">
</div>
<div class="col-xs-12">
	<br>
</div>
<div class="col-xs-2">
	<select name="data[Booklist][grade]" class="form-control">
	  <option value="通用">年级 - 通用</option>
	  <option value="大一">大一</option>
	  <option value="大二">大二</option>
	  <option value="大三">大三</option>
	  <option value="大四">大四</option>
	</select>
</div>
<div class="col-xs-2">
	<select name="data[Booklist][school]" class="form-control">
	  <option value="通用">院系 - 通用</option>
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
<div class="col-xs-2">
	<select name="data[Booklist][semester]" class="form-control">
	  <option value="通用">学期 - 通用</option>
	  <option value="春季学期">春季学期</option>
	  <option value="秋季学期">秋季学期</option>
	</select>
</div>
<div class="col-xs-2">
	<?php echo $this->Form->end(
		array(
			'label' => 'Add',
			'class' => 'btn btn-success btn-default'
	)); ?>
</div>




<?php echo $this->Form->create('Booklist'); ?>
<?php 
echo $this->Form->input('find', array(
	'type' => 'hidden',
	'value' => '1'
));
?>
<div class="col-xs-12"><hr><h3><a>搜索 / 编辑</a></h3></div>
<div class="col-xs-2 col-sm-2">
	<select name="data[Booklist][grade]" class="form-control">
	  <option value="all">年级</option>
	  <option value="通用">通用</option>
	  <option value="大一">大一</option>
	  <option value="大二">大二</option>
	  <option value="大三">大三</option>
	  <option value="大四">大四</option>
	</select>
</div>
<div class="col-xs-2 col-sm-2">
	<select name="data[Booklist][school]" class="form-control">
	  <option value="all">院系</option>
	  <option value="通用">通用</option>
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
<div class="col-xs-2 col-sm-2">
	<select name="data[Booklist][semester]" class="form-control">
	  <option value="all">学期</option>
	  <option value="通用">通用</option>
	  <option value="春季学期">春季学期</option>
	  <option value="秋季学期">秋季学期</option>
	</select>
</div>
<div class="col-xs-2 col-sm-2">
	<?php echo $this->Form->end(
		array('label' => 'Find', 'class' => 'btn btn-info btn-default'
	)); ?>
</div>
<div class="col-xs-12"><br></div>
