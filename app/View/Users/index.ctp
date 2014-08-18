<div class="panel panel-default">
  <div class="panel-body">
		<ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active">
		<a href="#myitem" role="tab" data-toggle="tab">书摊</a>
	  </li>
      <li class="dropdown">
        <a href="#wishlist" role="tab" data-toggle="tab">关注</a>
      </li>
      <li class="dropdown">
        <a href="#setting" role="tab" data-toggle="tab">设置</a>
      </li>
      <li class="dropdown">
        <a href="#logout" role="tab" data-toggle="tab">离开</a>
      </li>
    </ul>
		<div id="myTabContent" class="tab-content">
	      <div class="tab-pane fade active in" id="myitem">
					<?php echo $this->element('Users/myitem'); ?>
	      </div>
	      <div class="tab-pane fade col-xs-12" id="wishlist"><br>
					<?php echo $this->element('Users/follow'); ?>
	      </div>
	      <div class="tab-pane fade col-xs-12" id="setting"><br>
					<?php echo $this->element('Users/setting'); ?>
	      </div>
		  <div class="tab-pane fade col-xs-12" id="logout">
			<p class="text-center">
			<br><br>
			  <a role="button" href="/users/logout" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> 离开书谱</a>
			<br><br>
			</p>
		  </div>
    </div>		
  </div>
</div>