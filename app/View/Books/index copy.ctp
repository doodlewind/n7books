
		<?php foreach ($books as $book): ?>
			<div class="row">
				<div class="col-md-2 col-xs-3">
					<?php echo '
					
					<img class="img-responsive" width="100" src="holder.js/100x150/sky/text:'.
					$book['Book']['title'].
					'">'
						
						; ?>
					
				</div>
				<div class="col-md-10 col-xs-9">
					<div class="caption">
						<h4>
							<a href="#" title="sample">

							<?php echo $this->Html->link($book['Book']['title'], 
								array('controller' => 'books', 'action' => 'view', $book['Book']['title'])); ?></a> <small><br>
							<?php echo $book['Book']['author']; ?></small>
						</h4>
						<p>
							<?php echo $book['Book']['comment']; ?>
						</p>
						<hr>
						<a><?php echo $book[0]['count'].'本</a> <a>￥'.$book[0]['min'].'起'; ?></a><?php
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

		<?php endforeach; ?>