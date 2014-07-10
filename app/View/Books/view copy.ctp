<!-- 
    <php foreach ($books as $book): ?>
			<div class="row">
				<div class="col-md-2 col-xs-4">
					<php echo '
					
					<img class="img-responsive" width="100" src="holder.js/100x150/sky/text:'.
					$book['Book']['title'].
					'">'
						
						; ?>
					
				</div>
				<div class="col-md-10 col-xs-8">
					<div class="caption">
						<h5>
							<a href="#" title="sample">

							<php echo $this->Html->link($book['Book']['title'], 
								array('controller' => 'books', 'action' => 'view', $book['Book']['title'])); ?></a> <small><br>
							<php echo $book['Book']['author']; ?></small>
						</h5>
						<p>
							<php echo '￥'.$book['Book']['price']; ?>
						</p>
						<p>
							<php echo $book['Book']['comment']; ?>
						</p>
						<hr>
						<a>...</a><php
						/*
								echo $this->Html->link(
                    '编辑',
                    array('action' => 'edit', $book['Book']['id']));
					echo "&nbsp;";
					
					echo $this->Form->postLink(
	                    '删除',
	                    array('action' => 'delete', $book['Book']['id']),
	                    array('confirm' => 'Are you sure?')
                );
						*/
            ?>
					</div>
				</div>
			</div>
			<hr>

    <php endforeach; ?>
		
		
		
		
<!List View
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="col-xs-4">
			<img class="img-responsive" width="100" data-src="holder.js/100x150/sky/text:GRE考试官方指南" alt="GRE考试官方指南" style="width: 100px; height: 150px;">					
		</div>
		<div class="col-xs-4">
			<div class="caption">
				<h5><a>GRE考试官方指南</a><br><small>ETS</small></h5><br><small>"学长骗我买的"</small>
			</div>
		</div>	
		<div class="col-xs-3">
				<h5><p class="text-right"><a>￥20起</a><br><small>共5本</small></p><h5>
		</div>
		<hr>
	</div>	
</div>

-->
<?php 
echo $books[0]['User']['username'];

?>
	