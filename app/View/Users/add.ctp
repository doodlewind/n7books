<?php echo $this->Html->script('/js/user-add'); ?>
<?php echo $this->Form->create('User'); ?>
  <div class="col-sm-8 col-sm-offset-2">
		<h3><a>欢迎光临南七书谱</a><br><small>一分钟的事情</small></h3><hr>
	</div>
  <div class="col-sm-8 col-sm-offset-2">
	<div>
			<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'controller' => 'users',  'action' => 'edit')); ?>
								
				<label for="UserUsername" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-user"></span></p></label>
				<div class="input required col-xs-7">
					<input name="data[User][username]" class="form-control" type="text" id="UserUsername"
					placeholder="昵称，中/英/数字，10字内" required="required"><br>
				</div>
															
				<label for="UserEmail" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-envelope"></span></p></label>
				<div class="input required col-xs-7">
					<input name="data[User][email]" class="form-control" type="text" id="UserEmail"
					placeholder="科大邮箱 / 其它邮箱" required="required"><br>
				</div>
				
				<label for="UserMobile" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-earphone"></span></p></label>
				<div class="input required col-xs-7">
					<input name="data[User][mobile]" class="form-control" type="text" id="UserMobile"
					placeholder="手机号" required="required"><br>
				</div><br>
				
				<label for="UserPassword" class="col-xs-3 control-label"><p class="text-right"><span class="glyphicon glyphicon-lock"></span></p></label>
				<div class="input required col-xs-7">
					<input name="data[User][password]" class="form-control" type="password" id="UserPassword"
					placeholder="6-16 位字母/数字" required="required"><br>
				</div><br>
				<div class="col-xs-12 col-xs-offset-3">	
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default active">
							<input type="radio" name="data[User][campus]" value="东区"checked>东区
						</label>
						<label class="btn btn-default">
							<input type="radio" name="data[User][campus]" value="西区">西区
						</label>											
					</div><br>
					<?php echo $this->Form->end(
					array('label' => '注册',
						'class' => 'btn btn-primary',
						'before' => '<br>',
						'disabled' => 'true',
						'id' => 'UserSubmit',
						'div' => false
					) );?>
					 &nbsp;&nbsp;<label class="checkbox-inline"><small>
					   <input type="checkbox" id="agree" value="true">同意<a data-toggle="modal" data-target=".bs-example-modal-sm">用户协议</a>
					 </label></small>
					 	<br><br>
					<!--/.modal-->	
					
					 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
				     <div class="modal-dialog modal-sm">
				       <div class="modal-content">

				         <div class="modal-header">
				           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				           <h4 class="modal-title" id="mySmallModalLabel">用户须知</h4>
				         </div>
				         <div class="modal-body">
				          · 你可以：自由上传 / 浏览本站内容<br><br>
						  · 你不可以：上传非法内容 / 爬取数据 / 压力测试<br><br>
						  · 对「非法」的定义，本站有最终解释权<br><br>
						  · 就酱
				         </div>
				       </div><!-- /.modal-content -->
				     </div><!-- /.modal-dialog -->
				   </div>
					 
					 
					 
					 
					 
				</div>
		</div>
	</div>
</div><!--row-->