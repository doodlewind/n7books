<?php
echo $this->Html->script('/js/upload-form');
echo $this->Form->create('Book'); 
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div id="myTabContent" class="tab-content">
			<!--Step 1-->
			<div class="tab-pane fade col-xs-12 active in" id="step1">
				  <h4><a>Step 1 - 分类</a></h4><hr>
				  		<!--书籍/材料-->
						<div class="col-xs-7">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="data[Book][type]" value="书籍">书籍
								</label>
								<label class="btn btn-default">
									<input type="radio" name="data[Book][type]" value="材料">材料
								</label>
							</div>
						</div>
					  	<!--分类-->
						<div class="col-xs-5">
							<select class="form-control" name="data[Book][category]" id="BookCategory">
								<option value="">分类</option>
								<option value="数理">数理</option>
								<option value="生化">生化</option>
								<option value="信息">信息</option>
								<option value="工程">工程</option>
								<option value="外语">外语</option>
								<option value="社科">社科</option>
								<option value="杂家">杂家</option>
							</select>
						</div>
						<!--下一步-->
						<div class="col-xs-12"><br>
							<p class="text-right">
								<a href="#step2" id="button1" role="tab" type="button" data-toggle="tab" class="btn btn-primary" disabled>Next</a>							
							</p>
						</div>
		      </div>
		      <div class="tab-pane fade col-xs-12 " id="step2">
					<h4><a>Step 2 - 名称</a></h4><hr>
					<div class="paper">
						<div class="col-xs-12">
							<input type="text" class="form-control" name="data[Book][title]" id="paper" placeholder="材料名">
						</div>
					</div>
					<div class="book">
						<!--常用书名-->
						<div class="col-xs-12">
							<h4><small>选择常用书名<br>或输入扉页/条码上的ISBN</small></h4>
						</div>
						<div class="col-xs-6">
							<select class="form-control" id="RegularTitle">
								<option value="">常用书名</option>
								<option value="9787312028120">微积分学导论上册</option>
								<option value="生化">生化</option>
							</select>
						</div>
						<!--ISBN-->
						<div class="col-xs-6">
							<input type="tel" class="form-control" name="data[Book][Isbn]" id="BookIsbn" placeholder="ISBN">
						</div>
						<!--AJAX简介-->
						<div id="intro" class="col-xs-12">
							<h5 class="text-right"><bookTitle></bookTitle><bookAuthor></bookAuthor></h5>
							<input type="hidden" name="data[Book][title]" id="ajaxTitle">
							<input type="hidden" name="data[Book][author]" id="ajaxAuthor">
							<input type="hidden" name="data[Book][cover]" id="ajaxCover">
						</div>
					</div>
					<!--下一步-->
					<div class="col-xs-12"><br>
						<p class="text-right">
							<a href="#step3" id="button2" role="tab" type="button" data-toggle="tab" class="btn btn-primary" disabled>Next</a>
						</p>
					</div>
		      </div>
		      <div class="tab-pane fade col-xs-12 " id="step3"><br>
				  	<h4><a>Step 3 - 完善</a></h4><hr>
					<!--成色-->
					<div class="col-xs-12">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
							<input type="radio" name="data[Book][fineness]" value="崭新">崭新</label>
							<label class="btn btn-default active"><input type="radio" name="data[Book][fineness]" value="刷过" checked="">刷过</label>
							<label class="btn btn-default"><input type="radio" name="data[Book][fineness]"value="刷残">刷残</label>
						</div>
					</div>
					<!--价格-->
					<div class="col-xs-12"><br>
						<div class="form-group has-success">
							<div class="input-group">
							<div class="input-group-addon">￥</div>
								<input type="tel" class="form-control" name="data[Book][price]" placeholder="0-100 整数">
							</div>
						</div>
					</div>
					<!--评论-->
					<div class="col-xs-12">
					    <textarea class="form-control" name="data[Book][comment]"rows="3" placeholder="为了勾搭师弟师妹，点评几句呗"></textarea>
					</div>
					<!--Submit-->
					<div class="col-xs-12"><br>
						<p class="text-right">
						<?php 
							echo $this->Form->end(array(
								'label' => '提交',
								'class' => 'btn btn-primary',
								'disabled' => 'disabled',
								'div' => false
							));
						?>
						</p>
					</div>
			  </div>
		</div>
	</div>
</div>