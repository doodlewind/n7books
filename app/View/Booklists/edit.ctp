
<?php
echo $this->element('booklist_edit');
?>
<br>
	  <table class="table table-hover">
			<tbody>
				<tr>
					<td></td>
					<td>标题</td>
					<td>作者</td>
					<td>类型</td>
					<td>年级</td>
					<td>院系</td>
					<td>学期</td>
					<td>编辑</td>
					<td>删除</td>
				</tr>
<?php foreach ($books as $book){?>
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
							'value' => $book['Booklist']['type']
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
<?php }?>
			</tbody>
		</table>
<?php
echo '<div class="col-xs-8 "><ul class="pagination">';
echo $this->Paginator->numbers(array(
	'first' => '<<',
	'last' => '>>',
	'tag' => 'li',
	'separator' => '',
	'currentTag' => 'a',
	'currentClass' => 'active'
));
echo '</ul></div>';


echo '</div>';
?>