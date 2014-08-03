<!--添加begin-->
<?php echo $this->Form->create('Booklist'); ?>
<div class="col-xs-12"><h3><a>添加</a></h3></div>
<div class="col-xs-3">
	<input type="text" class="form-control" name="data[Booklist][course]" placeholder="课程">
</div>
<div class="col-xs-3">
	<input type="text" class="form-control" name="data[Booklist][title]" placeholder="书名">
</div>
<div class="col-xs-3">
	<input type="text" class="form-control" name="data[Booklist][author]" placeholder="作者">
</div>

<div class="col-xs-12">
	<br>
</div>
<div class="col-xs-2">
	<select name="data[Booklist][grade]" class="form-control">
	  <option value="大一">大一</option>
	  <option value="大二">大二</option>
	  <option value="大三">大三</option>
	  <option value="大四">大四</option>
	</select>
</div>
<div class="col-xs-2">
	<select name="data[Booklist][school]" class="form-control">
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
<!--添加end-->



<!--编辑begin-->
<?php echo $this->Form->create('Booklist'); ?>
<?php 
echo $this->Form->input('find', array(
	'type' => 'hidden',
	'value' => '1'
));
?>
<div class="col-xs-12"><hr><h3><a>查找 / 编辑</a></h3></div>
<div class="col-xs-2 col-sm-2">
	<select name="data[Booklist][grade]" class="form-control">
	  <option value="">年级</option>
	  <option value="大一">大一</option>
	  <option value="大二">大二</option>
	  <option value="大三">大三</option>
	  <option value="大四">大四</option>
	</select>
</div>
<div class="col-xs-2 col-sm-2">
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
<div class="col-xs-2 col-sm-2">
	<select name="data[Booklist][semester]" class="form-control">
	  <option value="">学期</option>
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




<br>
	  <table class="table table-hover table-condensed">
			<tbody>
				<tr>
					<td></td>
					<td>标题</td>
					<td>作者</td>
					<td>课程</td>
					<td>年级</td>
					<td>院系</td>
					<td>学期</td>
					<td>编辑</td>
					<td>删除</td>
				</tr>
<?php
if (isset($books)) {
	foreach ($books as $book){?>
				<tr>
					<td>
						<?php echo $this->Form->create('Booklist');?>
					</td>
					<?php 
					
					echo $this->Form->input('id', array(
						'type' => 'hidden',
						'value' => $book['Booklist']['id']
					));
					
					?>
					<td><?php 
	   			 echo $this->Form->input('title',array(
							'label' => '',
							'class' => 'form-control',
							'value' => $book['Booklist']['title']
						));
						?>
					</td>
					<td><?php 
	   					 echo $this->Form->input('author',array(
							'label' => '',
							'class' => 'form-control',
							'value' => $book['Booklist']['author']
						));
						?>
					</td>
					<td><?php 
	   					 echo $this->Form->input('type',array(
							'label' => '',
							'class' => 'form-control',
							'value' => $book['Booklist']['course']
						));
						?>
					</td>
					<td><?php 
	   					 echo $this->Form->input('type',array(
							'label' => '',
							'class' => 'form-control',
							'value' => $book['Booklist']['grade']
						));
						?>
					</td>
					<td><?php 
	   					 echo $this->Form->input('type',array(
							'label' => '',
							'class' => 'form-control',
							'value' => $book['Booklist']['school']
						));
						?>
					</td>
					<td><?php 
	   					 echo $this->Form->input('type',array(
							'label' => '',
							'class' => 'form-control',
							'value' => $book['Booklist']['semester']
						));
						?>
					</td>
					<td><br><?php
						echo $this->Form->end(array(
							'label' => 'Edit',
							'class' => 'btn btn-default btn-warning'
						));
						?>
					</td>
					<td><br>
			<?php echo $this->Form->postLink(
                  'Del',
                  array('controller'=>'booklists','action' => 'delete', $book['Booklist']['id']),
                  array('confirm' => '真的...要...删除吗?',
												'role' => 'button',
												'class' => 'btn btn-danger',
									)
            );
			?>
					</td>
				</tr>
<?php }
}
?>
			</tbody>
		</table>
<!--编辑end-->