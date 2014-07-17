<div>
<h4><small>当有学霸上传包含以下关键词的书籍时，书谱将邮件通知你（beta）</small></h4>
</div>
<div class="col-xs-12">
	<br>
	<table class="table table-hover">
		<tbody>
<?php foreach($user['Follow'] as $follow) { ?>
			<tr>
				<td><span class="glyphicon glyphicon-eye-open"></span> 
					<?php echo $follow['keyword']; ?>
				</td>
				<td>
					<?php echo $this->Form->postLink(
		                  '删除',
		                  array('controller'=>'follows','action' => 'delete', $follow['id']),
		                  array('confirm' => '真的...要...删除吗?',
														'role' => 'button',
														'class' => 'btn btn-default btn-xs',
											)
		            );
					?>
				</td>
			</tr>
<?php }?>
		</tbody>
	</table>
</div>


<div class="col-xs-12">
<?php 
echo $this->Form->create('Follow', array('controller' => 'follows', 'action' => 'add'));
echo $this->Form->input('user_id', array(
	'type' => 'hidden',
	'value' => $user['User']['id']
));
?>
	<div class="col-xs-4">
		<input type="text" class="form-control" name="data[Follow][keyword]" placeholder="Keyword">
	</div>
	<div class="col-xs-2">
		<?php 
		echo $this->Form->end(
			array(
				'label' => '添加',
				'class' => 'btn btn-success btn-default'
		)); 
		?>
		<br>
	</div>
</div>