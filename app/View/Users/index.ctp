<div class="row">
	<div class="col-md-9 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-body">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li class="active">
					<a href="#myitem" role="tab" data-toggle="tab">我的书摊</a>
				  </li>
			      <li class="dropdown">
			        <a href="#setting" role="tab" data-toggle="tab">个人设置</a>
			      </li>
			      <li class="dropdown">
			        <a href="#logout" role="tab" data-toggle="tab">离开书摊</a>
			      </li>
			    </ul>
				<div id="myTabContent" class="tab-content">
			      <div class="tab-pane fade active in" id="myitem">
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
			
			$state_button_text  = '<span class="glyphicon glyphicon-repeat"></span>';
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
				      </div>
				      <div class="tab-pane fade col-xs-12" id="setting"><br>
							<div>
									<?php echo $this->Form->create('User',
													array('class' => 'form-horizontal', 'controller' => 'users',  'action' => 'edit')
												); 
												echo $this->Form->input('id', array('type' => 'hidden',
													'value' => $user['User']['id']
												));
												
												?>
												
												
										<label for="UserUsername" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-user"></span></p></label>
										<div class="input required col-xs-7">
											<input name="data[User][username]" class="form-control" type="text" id="UserUsername" value=<?php  echo '"'.$user['User']['username'].'"';?> required="required"><br>
										</div>
																					
										<label for="UserEmail" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-envelope"></span></p></label>
										<div class="input required col-xs-7">
											<input name="data[User][email]" class="form-control" type="text" id="UserEmail" value=<?php  echo '"'.$user['User']['email'].'"';?> required="required"><br>
										</div>
										
										<label for="UserMobile" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-earphone"></span></p></label>
										<div class="input required col-xs-7">
											<input name="data[User][mobile]" class="form-control" type="text" id="UserMobile" value=<?php  echo '"'.$user['User']['mobile'].'"';?> required="required"><br>
										</div><br>
										
										
										<div class="col-xs-12 col-xs-offset-3">	
										
											<div class="btn-group" data-toggle="buttons">
												<?php
													$campus = array('东区','西区');
													$select = '';
													foreach ($campus as $camp){
														$tmp1 = '';
														$tmp2 = '';
				
														if ($camp ==  $user['User']['campus']){
															$tmp1 = 'active';
															$tmp2 = 'checked';
														}
														$select.= '<label class="btn btn-default ';
														$select.= $tmp1;
														$select.= '"><input type="radio" name="data[Book][category]" value="';
														$select.= $camp.'"';
														$select.= $tmp2.'>'.$camp.'</label>';
													}
													echo $select;
												?>
												
											</div>
										<?php echo $this->Form->end(
										array('label' => '修改信息',
											'class' => 'btn btn-primary',
											'before' => '<br>'
										) );?>
										</div>
										<div class="col-xs-12"><hr></div>	
										<?php echo $this->Form->create('User',
												array('controller' => 'users',  'action' => 'edit')
											);
											echo $this->Form->input('id', array('type' => 'hidden',
												'value' => $user['User']['id']
											));
										   ?>
										<label for="UserPassword" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-lock"></span></p></label>
										<div class="input required col-xs-7">
											<input name="data[User][password]" class="form-control" type="text" id="UserPassword" value="" placeholder="6-16 位英文字母 / 数字"required="required"><br>
										</div><br>
										
										<div class="col-xs-12 col-xs-offset-3">
										<?php 
												echo $this->Form->end(
												array('label' => '修改密码', 'class' => 'btn btn-primary') );
												echo $this->Form->input('id', array('type' => 'hidden',
													'value' => $user['User']['id'],
												));
										?>
										</div>
								  </div>
				      </div>
					  <div class="tab-pane fade col-xs-12" id="logout">
						<p class="text-center">
						<br><br>
						  <a role="button" href="/users/logout" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> 离开书摊</a>
						<br><br>
						</p>
					  </div>
			    </div>		
		  </div>
		</div>
	</div>
</div>