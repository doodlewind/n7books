<!-- File: /app/View/Books/add.ctp -->
<?php
/*
echo $this->Form->create('Book');
echo $this->Form->input('title',
	array('label' => '', 'class' => 'form-control', 'placeholder' => '标题'));
echo '<br>';
echo $this->Form->input('comment', 
	array('label' => '', 'class' => 'form-control', 'placeholder' => '评论'));
echo '<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>';
echo $this->Form->end('提交');
*/
?>
<?php echo $this->Form->create('Book'); 
?>
<div class="row">
  <div class="col-md-4 col-md-offset-3">
		<h3>发布旧书</h3>
	</div>
	<div class="col-md-7 col-md-offset-3">
	<hr>
	</div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-3">
		<?php
		echo $this->Form->input('cover', array('type' => 'hidden'));
		echo $this->Form->input('title',
						array('label' => '书 / 材料名', 'class' => 'form-control', 'placeholder' => '')); ?>
	<span class="help-block">尽量准确地输入书 / 材料名</span>
  </div>
  <div class="col-md-3">
			<?php 
				echo $this->Form->input('author',
					array('label' => '作者', 'class' => 'form-control', 'placeholder' => ''));
			?>
		<span class="help-block">思修 / GT宝书 / 吉米多维奇等名著作者可不填</span>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-offset-3">
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-default active"><input type="radio" name="data[Book][category]" value="数理" checked> 数理</label> 
			<label class="btn btn-default"><input type="radio" name="data[Book][category]" value="生化"> 生化</label> 
			<label class="btn btn-default"><input type="radio" name="data[Book][category]" value="信息"> 信息</label> 
			<label class="btn btn-default"><input type="radio" name="data[Book][category]" value="工程"> 工程</label> 
			<label class="btn btn-default"><input type="radio" name="data[Book][category]" value="外语"> 外语</label> 
			<label class="btn btn-default"><input type="radio" name="data[Book][category]" value="社科"> 社科</label> 
			<label class="btn btn-default"><input type="radio" name="data[Book][category]" value="杂家"> 其它</label>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-6 col-md-4 col-md-offset-3">
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-default active">
				<input type="radio" name="data[Book][type]" value="书籍">书籍
			</label>
			<label class="btn btn-default">
				<input type="radio" name="data[Book][type]" value="材料" checked>材料
			</label>
		</div>
	</div>
		
	<div class="col-xs-6 col-md-3">
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-default">
				<input type="radio" name="data[Book][fineness]" value="崭新">崭新</label>
				<label class="btn btn-default active"><input type="radio" name="data[Book][fineness]" value="刷过" checked="">刷过</label>
				<label class="btn btn-default"><input type="radio" name="data[Book][fineness]"value="刷残">刷残</label>
		</div>
		
	</div>
	

</div>

<div class="row">

  <div class="col-xs-6 col-md-3 col-xs-offset-6 col-md-offset-7">
<br><br>
			 <div class="form-group has-success">
			     <div class="input-group">
			       <div class="input-group-addon">￥</div>
			       <input class="form-control" name="data[Book][price]"  placeholder="0-100 整数">
			     </div>
			   </div>

	</div>
	<div class="col-md-7 col-md-offset-3">
    <textarea class="form-control" name="data[Book][comment]"rows="3" placeholder="为了勾搭师弟师妹，就点评几句呗"></textarea>
		<br>
		
<?php echo $this->Form->end(
			array('label' => '上摊', 'class' => 'btn btn-primary btn-lg btn-block') );?>		
  </div>
</div>