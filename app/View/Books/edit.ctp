
<?php
	echo $this->Html->script('/js/edit-form');
	echo $this->Form->create('Book'); 
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->input('user_id', array('type' => 'hidden'));
	echo $this->Form->input('on_shelf', array('type' => 'hidden'));
	echo $this->Form->input('cover', array('type' => 'hidden'));
?>
<div class="col-xs-12 col-sm-8 col-sm-offset-2">
	<div class="col-xs-12">
		<h4><a>编辑详情</a></h4><hr>
	</div>
	<div class="col-xs-6">
		<?php 
			echo $this->Form->input('title',array(
				'label' => '书 / 材料名',
				'class' => 'form-control'
			)); 
		?>
	</div>
	<div class="col-xs-6">
		<?php 
			echo $this->Form->input('author',array(
				'label' => '作者',
				'class' => 'form-control',
				'placeholder' => ''
			));
		?>
	</div>
	<!--分类-->
	<div class="col-xs-4"><br>
			<select class="form-control" name="data[Book][category]" id="BookCategory">
				<option value="生化">生化</option>
				<option value="数理">数理</option>
				<option value="信息">信息</option>
				<option value="工程">工程</option>
				<option value="外语">外语</option>
				<option value="社科">社科</option>
				<option value="杂家">杂家</option>
			</select>
			<?php echo '<input id="bookCategory" type="hidden" value="'.$this->request->data['Book']['category'].'">'; ?>
	</div>
	<!--分类-->
	<div class="col-xs-4"><br>
			<select class="form-control" name="data[Book][type]" id="UserSchoool">
				<option value="书籍">书籍</option>
				<option value="材料">材料</option>
			</select>
			<?php echo '<input id="bookType" type="hidden" value="'.$this->request->data['Book']['type'].'">'; ?>
	</div>
	<!--成色-->
	<div class="col-xs-4"><br>
			<select class="form-control" name="data[Book][fineness]" id="UserSchoool">
				<option value="崭新">崭新</option>
				<option value="刷过">刷过</option>
				<option value="刷残">刷残</option>
			</select>
			<?php echo '<input id="bookFineness" type="hidden" value="'.$this->request->data['Book']['fineness'].'">'; ?>
	</div>

	<div class="col-xs-12 ">
		<br>
		 <div class="form-group has-success">
		     <div class="input-group">
		       <div class="input-group-addon">￥</div>
					 <?php
						 echo $this->Form->input('price',array(
							 'label' => '',
							 'class' => 'form-control',
							 'placeholder' => '0-100 整数'
						 ));
					 ?>
		     </div>
		   </div>
		</div>
		<div class="col-xs-12">
		 <?php
			 echo $this->Form->textarea('comment',
		 						array('label' => '',
											'class' => 'form-control',
											'rows' => '3',
											'placeholder' => '为了勾搭师弟师妹，就点评几句呗'
										 ));
		 ?>
			<br>
				<a href="/users" role="button" class="btn btn-success">返回</a>
				<input class="btn btn-primary" type="submit" value="保存"></form>
				<?php echo $this->Form->postLink(
	                  '删除',
	                  array('controller'=>'books','action' => 'delete', $this->request->data['Book']['id']),
	                  array('confirm' => '真的...要...删除吗?',
													'role' => 'button',
													'class' => 'btn btn-danger',
										)
	            );
				?>
	  </div>
	</div>
</div>