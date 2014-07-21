
<?php echo $this->Form->create('Book'); 
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->input('user_id', array('type' => 'hidden'));
	echo $this->Form->input('on_shelf', array('type' => 'hidden'));
	echo $this->Form->input('cover', array('type' => 'hidden'));
?>
<div class="row">
  <div class="col-md-4 col-md-offset-3">
		<h3>编辑详情</h3>
	</div>
	<div class="col-md-7 col-md-offset-3">
	<hr>
	</div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-3">
		<?php echo $this->Form->input('title',
						array('label' => '书 / 材料名', 'class' => 'form-control' )); ?>
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
			<?php
				$categories = array('数理','生化','信息','工程','外语','社科','其它');
				$select = '';
				
				foreach ($categories as $category){
					$tmp1 = '';
					$tmp2 = '';
					
					if ($category ==  $this->request->data['Book']['category']){
						$tmp1 = 'active';
						$tmp2 = 'checked';
					}
					
					$select.= '<label class="btn btn-default ';
					$select.= $tmp1;
					$select.= '"><input type="radio" name="data[Book][category]" value="';
					$select.= $category.'"';
					$select.= $tmp2.'>'.$category.'</label>';
				}
				echo $select;
			?>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-6 col-md-4 col-md-offset-3">
		<div class="btn-group" data-toggle="buttons">	
			<?php
				$types = array('书籍','材料');
				$select = '';
				
				foreach ($types as $type){
					$tmp1 = '';
					$tmp2 = '';
					
					if ($type ==  $this->request->data['Book']['type']){
						$tmp1 = 'active';
						$tmp2 = 'checked';
					}
					
					$select.= '<label class="btn btn-default ';
					$select.= $tmp1;
					$select.= '"><input type="radio" name="data[Book][type]" value="';
					$select.= $type.'"';
					$select.= $tmp2.'>'.$type.'</label>';
				}
				echo $select;
			?>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="btn-group" data-toggle="buttons">
			
			<?php
				$types = array('崭新','刷过','刷残');
				$select = '';
				
				foreach ($types as $type){
					$tmp1 = '';
					$tmp2 = '';
					
					if ($type ==  $this->request->data['Book']['fineness']){
						$tmp1 = 'active';
						$tmp2 = 'checked';
					}
					
					$select.= '<label class="btn btn-default ';
					$select.= $tmp1;
					$select.= '"><input type="radio" name="data[Book][fineness]" value="';
					$select.= $type.'"';
					$select.= $tmp2.'>'.$type.'</label>';
				}
				echo $select;
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-md-3 col-xs-offset-3 col-md-offset-3">
		<br><br>
   
	 <div class="checkbox">
	   <label>
	     <input name="data[Book][update]" id="BookUpdate" type="checkbox" value="1" checked> 封面
	   </label>
	 </div>
	 
	 
	</div>
  <div class="col-xs-6 col-md-3 col-xs-offset-1">
<br><br>
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
	<div class="col-md-7 col-md-offset-3">
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