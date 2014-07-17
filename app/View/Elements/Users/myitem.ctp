							<br>
							<table class="table table-hover">
							  <thead>
									<tr>
										<th>标题</th>
										<th>作者</th>
										<th>定价</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
<?php 

foreach ($user['Book'] as $book) {
	
		$edit_button_class  = 'btn btn-default btn-xs ';
		$edit_button_text  = ' 编辑';
		$edit_button_action = array('controller' => 'books', 'action' => 'edit', $book['id']);
		
		$state_button_class  = 'btn btn-success btn-xs ';
		$state_button_text  = '成交';
		$state_button_action = array('controller' => 'books', 'action' => 'deal', $book['id']);
		
		if ($book['on_shelf']=='成交') {
			
			$edit_button_class .= 'disabled';
			
			$state_button_text  = '上架';
			$state_button_action = array('controller' => 'books', 'action' => 'cancel', $book['id']);
		}
		
		$edit_button = $this->Html->link(
		    $edit_button_text,
		    $edit_button_action,
				array(
					'role' => 'button',
					'class' => $edit_button_class,
					'escape' => false
				)
		);
		$state_button = $this->Form->postLink(
		    $state_button_text,
		    $state_button_action,
				array(
					'role' => 'button',
					'class' => $state_button_class,
					'escape'=> false
				)
		);

		$str = '<tr>';
		$str.= '<td>'.$book['title'].'</td>';
		$str.= '<td>'.$book['author'].'</td>';
		$str.= '<td><a><b>'.'￥'.$book['price'].'</a></b></td>';
		$str.= '<td>'.$book['on_shelf'].'</td>';
		$str.= '<td><div class="btn-group">'.$edit_button.'&nbsp;'.$state_button.'</div></td>';
		$str.= '</tr>';
		echo $str;
}
?>
							</tbody>
						</table>